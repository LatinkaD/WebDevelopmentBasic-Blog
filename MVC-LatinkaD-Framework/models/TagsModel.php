<?php
class TagsModel extends BaseModel {
    public function getAllTags() {
        $statement = self::$db->query("SELECT * FROM tags");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function getFilteredTags() {
        $statement = self::$db->query("SELECT * FROM tags t JOIN posts p WHERE t.id == p.tag_id");
        return $statement->fetch_all(MYSQL_ASSOC);
    }
}