<?php
class TagsModel extends BaseModel {
    public function getAllTags() {
        $statement = self::$db->query("SELECT * FROM tags");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function getFilteredTags() {
        $statement = self::$db->prepare("SELECT id, tag FROM tags t JOIN posts p on t.id == p.tag_id");
        $statement->execute();
        $statement->bind_result($id, $tag);
    }
}