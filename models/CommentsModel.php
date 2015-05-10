<?php

class CommentsModel extends BaseModel {
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
        $statement -> bind_param("si", mysql_real_escape_string($content), mysql_real_escape_string($id));
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