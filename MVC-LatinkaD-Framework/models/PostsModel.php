<?php
class PostsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM posts");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function getFilteredBooks($from, $size) {
        $statement = self::$db->prepare("SELECT * FROM posts LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }
}