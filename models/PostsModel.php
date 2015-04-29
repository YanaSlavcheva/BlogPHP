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

    public function create($title, $content) {
        if ($title == '' || $content == '') {
            return false;
        }

        $statement = self::$db -> prepare(
            "INSERT INTO `posts` SET `title` = ?,`content` = ?");
        $statement -> bind_param("ss", $title, $content);
        $statement -> execute();
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
