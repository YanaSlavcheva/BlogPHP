<?php

class PostsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db -> query(
            "SELECT
                p.post_id,
                p.title,
                p.content,
                GROUP_CONCAT(tag_content ORDER BY tag_content ASC SEPARATOR ', ') AS tags
            FROM php_blog_system.posts p
            LEFT JOIN php_blog_system.posts_tags pt ON p.post_id = pt.post_id
            LEFT JOIN php_blog_system.tags t ON t.tag_id = pt.tag_id
            Group BY p.title, p.post_id
            ORDER BY p.post_id");
        return $statement -> fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db -> prepare(
            "SELECT * FROM posts WHERE post_id = ?");
        $statement -> bind_param("i", $id);
        $statement -> execute();
        return $statement -> get_result()->fetch_assoc();
    }

    public function create($title, $content, $tags) {
        if ($title == '' || $content == '') {
            return false;
        }

        $statement = self::$db -> prepare(
            "INSERT INTO `posts` SET `title` = ?, `content` = ?");
        $statement -> bind_param("ss", $title, $content);
        $statement -> execute();

        // TODO: get post_id (the last created post)
        $statement = self::$db -> prepare(
            "SELECT LAST_INSERT_ID()");
        $statement -> execute();
        $curr_post_id_array = $statement -> get_result() -> fetch_assoc();
        $curr_post_id = $curr_post_id_array["LAST_INSERT_ID()"];

        // TODO: split tags
        $tags_array = explode(', ', $tags);

        // TODO: foreach tag check if exists in db / add to db / get the id
        foreach ($tags_array as $curr_tag_content) {
            $statement = self::$db -> prepare(
                "SELECT tag_id FROM tags WHERE tag_content = ?");
            $statement -> bind_param("s", $curr_tag_content);
            $statement -> execute();
            $curr_tag_id_array = $statement -> get_result()->fetch_assoc();
            $curr_tag_id = $curr_tag_id_array["tag_id"];

            // TODO: check if tag exists
            if ($curr_tag_id == null){
                $statement = self::$db -> prepare(
                    "INSERT INTO `tags` SET `tag_content` = ?");
                $statement -> bind_param("s", $curr_tag_content);
                $statement -> execute();

                // TODO: Get last inserted tag id
                $statement = self::$db -> prepare(
                    "SELECT LAST_INSERT_ID()");
                $statement -> execute();
                $curr_tag_id_array = $statement -> get_result() -> fetch_assoc();
                $curr_tag_id = $curr_tag_id_array["LAST_INSERT_ID()"];
            }

            // TODO: fill posts_tags table with info
            $statement = self::$db -> prepare(
                "INSERT INTO `posts_tags` SET `post_id` = ?, `tag_id` = ?");
            $statement -> bind_param("ss", $curr_post_id, $curr_tag_id);
            $statement -> execute();
        }
        // TODO: end of foreach

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
            "DELETE pt, p
            FROM posts_tags pt
            INNER JOIN posts p ON pt.post_id = p.post_id
            WHERE pt.post_id = ?");
        $statement -> bind_param("i", $id);
        $statement -> execute();

        return $statement -> affected_rows > 0;
    }
}
