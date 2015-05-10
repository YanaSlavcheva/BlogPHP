<?php

class TagsModel extends BaseModel {

    public function findPopularTags() {
        $statement = self::$db -> query(
            "SELECT
                COUNT(pt.post_id) AS count,
                pt.tag_id,
                t.tag_content
            FROM php_blog_system.posts_tags pt
            JOIN tags t ON t.tag_id = pt.tag_id
            GROUP BY pt.tag_id
            ORDER BY count DESC
            LIMIT 5");
        return $statement -> fetch_all();
    }
}