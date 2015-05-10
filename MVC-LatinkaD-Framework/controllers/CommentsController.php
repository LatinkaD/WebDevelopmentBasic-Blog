<?php

class CommentsController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Comments";
        $this->db = new CommentsModel();
    }

    public function index($id) {
        $this->id = $id;
        $this->post = $this->db->getById($id);
        $this->comments = $this->db->findCommentsByPostId($id);
        $this->renderView();
    }

    public function add() {
        if($this->isPost) {
            $comment = $_POST['comment'];
            if (strlen($comment) < 2) {
                $this->addFieldValue('comment', $comment);
                $this->addValidationError('comment', 'The comment should be at least 2 symbols.');
                return $this->renderView(__FUNCTION__);
            }

            if ($this->db->addComment($comment)) {
                $this->addInfoMessage("Comment added.");
            } else {
                $this->addErrorMessage("Cannot add comment.");
            }
            $this->redirect('posts');
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();
        if ($this->db->deleteComment($id)) {
            $this->addInfoMessage("Comment deleted.");
        } else {
            $this->addErrorMessage("Error deleting comment.");
        }
        $this->redirect('comments');
    }
}