<?php

class PostsModel extends BaseModel {

    public function getAll() {
        $statement = self::$db -> query(
            "SELECT
                p.post_id,
                p.title,
                p.content,
                GROUP_CONCAT(tag_content ORDER BY tag_content ASC  SEPARATOR ', ') AS tags,
                p.created_on,
                p.visits,
                CONCAT_WS(' ', u.first_name, u.last_name) AS author
            FROM php_blog_system.posts p
            LEFT JOIN php_blog_system.posts_tags pt ON p.post_id = pt.post_id
            LEFT JOIN php_blog_system.tags t ON t.tag_id = pt.tag_id
            LEFT JOIN php_blog_system.users u ON u.user_id = p.user_id
            GROUP BY p.post_id
            ORDER BY p.post_id DESC");
        return $statement -> fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        // increase counter for visits
        $visits_statement = self::$db -> prepare(
            "UPDATE php_blog_system.posts SET visits = visits + 1 WHERE post_id = ?");
        $visits_statement -> bind_param("i", $id);
        $visits_statement -> execute();

        // get post info from database
        $statement = self::$db -> prepare(
            "SELECT
                p.post_id,
                p.title,
                p.content,
                GROUP_CONCAT(tag_content ORDER BY tag_content ASC  SEPARATOR ', ') AS tags,
                p.created_on,
                p.visits,
                CONCAT_WS(' ', u.first_name, u.last_name) AS author
            FROM php_blog_system.posts p
            LEFT JOIN php_blog_system.posts_tags pt ON p.post_id = pt.post_id
            LEFT JOIN php_blog_system.tags t ON t.tag_id = pt.tag_id
            LEFT JOIN php_blog_system.users u ON u.user_id = p.user_id
            WHERE p.post_id = ?
            GROUP BY p.post_id");
        $statement -> bind_param("i", $id);
        $statement -> execute();
        return $statement -> get_result() -> fetch_assoc();
    }

    public function find($id) {
        $statement = self::$db -> prepare(
            "SELECT * FROM posts WHERE post_id = ?");
        $statement -> bind_param("i", $id);
        $statement -> execute();
        return $statement -> get_result()->fetch_assoc();
    }

    public function create($title, $content, $tags) {

        // split tags
        $tags_array = explode(', ', $tags);
        $tags_array_no_ghosts = array_values( array_filter($tags_array));

        if ($title == '' || $content == '' || count($tags_array_no_ghosts) <= 0) {
            return false;
        }

        $statement = self::$db -> prepare(
            "INSERT INTO `posts` SET `title` = ?, `content` = ?");
        $statement -> bind_param("ss", $title, $content);
        $statement -> execute();

        // get post_id (the last created post)
        $statement = self::$db -> prepare(
            "SELECT LAST_INSERT_ID()");
        $statement -> execute();
        $curr_post_id_array = $statement -> get_result() -> fetch_assoc();
        $curr_post_id = $curr_post_id_array["LAST_INSERT_ID()"];


        // TODO: tags must contain only letters, spaces and ,
        // TODO: validate so you cannot add only ,

        // foreach tag check if exists in db / add to db / get the id
        foreach ($tags_array as $curr_tag_content) {
            $statement = self::$db -> prepare(
                "SELECT tag_id FROM tags WHERE tag_content = ?");
            $statement -> bind_param("s", $curr_tag_content);
            $statement -> execute();
            $curr_tag_id_array = $statement -> get_result()->fetch_assoc();
            $curr_tag_id = $curr_tag_id_array["tag_id"];

            // check if tag exists
            if ($curr_tag_id == null){
                $statement = self::$db -> prepare(
                    "INSERT INTO `tags` SET `tag_content` = ?");
                $statement -> bind_param("s", $curr_tag_content);
                $statement -> execute();

                // get last inserted tag id
                $statement = self::$db -> prepare(
                    "SELECT LAST_INSERT_ID()");
                $statement -> execute();
                $curr_tag_id_array = $statement -> get_result() -> fetch_assoc();
                $curr_tag_id = $curr_tag_id_array["LAST_INSERT_ID()"];
            }

            // fill posts_tags table with info
            $statement = self::$db -> prepare(
                "INSERT INTO `posts_tags` SET `post_id` = ?, `tag_id` = ?");
            $statement -> bind_param("ss", $curr_post_id, $curr_tag_id);
            $statement -> execute();
        }
        // end of foreach

        return $statement -> affected_rows > 0;
    }

    public function edit($id, $title, $content) {
        if ($title == '' || $content == '') {
            return false;
        }

        $statement = self::$db -> prepare(
            "UPDATE posts SET title = ?, content = ? WHERE post_id = ?");
        $statement -> bind_param("ssi", $title, $content, $id);
        $statement -> execute();
        return $statement -> errno == 0;
    }

    public function delete($id) {
        $statement = self::$db -> prepare(
            "DELETE p, pt, c
              FROM posts p
              JOIN posts_tags pt ON pt.post_id = p.post_id
              JOIN comments c ON c.post_id = p.post_id
              WHERE p.post_id = ?");
        $statement -> bind_param("i", $id);
        $statement -> execute();

        return $statement -> affected_rows > 0;
    }

//    COMMENTS
    public function getAllCommentsByPostId($id) {
        $statement = self::$db -> prepare(
            "SELECT
                comment_id,
                content,
                post_id,
                author,
                created_on
            FROM php_blog_system.comments
            WHERE post_id = ?
            ORDER BY created_on DESC, author ASC");
        $statement -> bind_param("i", $id);
        $statement -> execute();
        $result = $statement -> get_result();
        while ($data = $result -> fetch_assoc())
        {
            $statistic[] = $data;
        }
        return $statistic;
    }

    public function comment($author, $content, $post_id) {
        if ($author == '' || $content == '') {
            return false;
        }

        $statement = self::$db -> prepare(
            "INSERT INTO `comments` SET `author` = ?, `content` = ?, `post_id` = ?");
        $statement -> bind_param("ssi", $author, $content, $post_id);
        $statement -> execute();

        return $statement -> affected_rows > 0;
    }
}
