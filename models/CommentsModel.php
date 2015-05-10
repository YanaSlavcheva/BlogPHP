<?php

class CommentsModel extends BaseModel {
//    public function getAllByPostId() {
//        $statement = self::$db -> prepare(
//            "SELECT
//                comment_id,
//                content,
//                post_id,
//                author,
//                created_on
//            FROM php_blog_system.comments
//            WHERE post_id = ?
//            ORDER BY created_on DESC, author ASC");
//        $statement -> bind_param("i", $id);
//        $statement -> execute();
//        return $statement -> get_result()->fetch_assoc();
//    }

//    public function getById($id) {
//        $statement = self::$db -> prepare(
//            "SELECT
//                p.post_id,
//                p.title,
//                p.content,
//                GROUP_CONCAT(tag_content ORDER BY tag_content ASC  SEPARATOR ', ') AS tags,
//                p.created_on,
//                p.visits,
//                CONCAT_WS(' ', u.first_name, u.last_name) AS author
//            FROM php_blog_system.posts p
//            LEFT JOIN php_blog_system.posts_tags pt ON p.post_id = pt.post_id
//            LEFT JOIN php_blog_system.tags t ON t.tag_id = pt.tag_id
//            LEFT JOIN php_blog_system.users u ON u.user_id = p.user_id
//            WHERE p.post_id = ?
//            GROUP BY p.post_id");
//        $statement -> bind_param("i", $id);
//        $statement -> execute();
//        return $statement -> get_result()->fetch_assoc();
//    }

    public function find($id) {
        $statement = self::$db -> prepare(
            "SELECT * FROM comments WHERE comment_id = ?");
        $statement -> bind_param("i", $id);
        $statement -> execute();
        return $statement -> get_result()->fetch_assoc();
    }

    public function edit($id, $content) {
        if ($content == '') {
            return false;
        }

        $statement = self::$db -> prepare(
            "UPDATE comments SET content = ? WHERE comment_id = ?");
        $statement -> bind_param("si", $content, $id);
        $statement -> execute();
        return $statement -> errno == 0;
    }

    public function delete($id) {
        $statement = self::$db -> prepare(
            "DELETE
              FROM comments
              WHERE comment_id = ?");
        $statement -> bind_param("i", $id);
        $statement -> execute();

        return $statement -> affected_rows > 0;
    }
}