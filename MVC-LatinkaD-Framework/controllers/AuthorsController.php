<?php

class AuthorsController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Authors";
        $this->db = new AuthorsModel();
    }

    public function index() {
        $this->authorize();
        $this->authors = $this->db->getAll();
        $this->renderView();
    }

    public function create() {
        if($this->isPost) {
            $name = $_POST['author_name'];
            if ($this->db->createAuthor($name)) {
                $this->addInfoMessage("Author created.");
            } else {
                $this->addErrorMessage("Error creating author.");
            }
            $this->redirect('authors');
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        if ($this->db->deleteAuthor($id)) {
            $this->addInfoMessage("Author deleted.");
        } else {
            $this->addErrorMessage("Error deleting author.");
        }
        $this->redirect('authors');
    }
}