<?php
class PostsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM posts");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function getFilteredPosts($from, $size) {
        $statement = self::$db->prepare("SELECT * FROM posts LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }

    public function getById($id) {
        $statement = self::$db->prepare("SELECT * FROM comments WHERE post_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result();
    }

    public function getAllCommentsByPostId($postId) {
        $statement = self::$db->prepare("
            SELECT comment, post_id
            FROM comments c INNER JOIN posts p
            ON c.user_id = p.id
            WHERE post_id = ?");
        $statement->bind_param("i", $postId);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }

    public function findCommentsByPostId($id) {
        $statement = self::$db->prepare("SELECT * FROM comments WHERE post_id = ? ");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result();
    }

    public function addPost($content) {
        if ($content == '') {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO posts VALUES(NULL, ?, now(), NULL, NULL)");
        $statement->bind_param("s", $content);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deletePost($id) {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}