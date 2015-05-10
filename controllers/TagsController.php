<?php

class TagsController extends BaseController {
    private $tagsModel;

    protected function onInit() {
        $this -> title = 'Tags';
        $this -> tagsModel = new TagsModel();
    }

    public function findPopularTags() {
        $this -> tags = $this -> tagsModel -> findPopularTags();
        $this -> renderView(__FUNCTION__, true);
    }
}