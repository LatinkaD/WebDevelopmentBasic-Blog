<?php

class CommentsModel extends BaseModel {
    public function getCommentsForPost($postId) {
        $statement = self::$db->prepare("SELECT * FROM comments c JOIN posts p ON p.id == c.post_id WHERE p.id = ?");
        $statement->bind_param("i", $postId);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }

    public function commentCount() {
        $statement = self::$db->query(
            "SELECT * FROM comments");
        $count = mysql_num_rows($statement);
        return $count;
    }

    public function addComment($comment)
    {
        if ($comment == '') {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO comments(id, post_id, user_id, comment) VALUES(NULL, NULL, NULL, ?)");
        $statement->bind_param("s", $comment);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deleteComment($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}