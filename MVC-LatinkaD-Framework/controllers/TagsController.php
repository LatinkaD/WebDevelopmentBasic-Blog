<?php
class TagsController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new TagsModel();
    }

    public function index() {
        $this->authorize();
        $this->filtTags = $this->db->getFilteredTags();
        $this->renderView(__FUNCTION__);
    }

    public function getAllTags() {
        $this->allTags = $this->db->getAllTags();
        $this->renderView(__FUNCTION__, false);
    }
}