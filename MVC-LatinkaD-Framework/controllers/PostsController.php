<?php

class PostsController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
    }

    public function index($page = 0, $pageSize = 5) {
        $from = $page * $pageSize;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->posts = $this->db->getFilteredPosts($from, $pageSize);
        $this->renderView(__FUNCTION__);
    }

    public function commentsCount() {

    }

    public function singlePost($id) {
        $this->id = $id;
        $this->post = $this->db->getById($id);
        $this->comments = $this->db->getAllCommentsByPostId($id);
        $this->renderView(__FUNCTION__);
    }

    public function showComments($id) {
        $this->id = $id;
        $this->post = $this->db->findCommentsByPostId($id);
        $this->comments = $this->db->getAllCommentsByPostId($id);
        $this->renderView();
    }

    public function showPosts() {
        $this->posts = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }

    public function add() {
        $this->authorize();
        if ($this->isPost) {
            $content = $_POST['content'];
            if (strlen($content) < 2) {
                $this->addFieldValue('content', $content);
                $this->addValidationError('content', 'The content should be at least 2 symbols');
                return $this->renderView(__FUNCTION__);
            }

            if ($this->db->addPost($content)) {
                $this->addInfoMessage("You successfully added your post");
            } else {
                $this->addErrorMessage("Error appeared.");
            }

            $this->redirect('posts');
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();
        if ($this->db->deletePost($id)) {
            $this->addInfoMessage("Post deleted successfully");
        } else {
            $this->addErrorMessage("Cannot delete this post");
        }

        $this->redirect('posts');
    }
}