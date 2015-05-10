<?php
//
//class CommentsController extends BaseController {
//    private $commentsModel;
//
//    protected function onInit() {
//        $this -> title = 'Comments';
//        $this -> commentsModel = new CommentsModel();
//    }
//
//    public function index($id) {
//        $this -> comments = $this -> commentsModel -> getAllByPostId($id);
//    }
//
//    public function post($id) {
//        $this -> comment = $this -> commentsModel -> getById($id);
//    }
//
//    public function create() {
//        if ($this -> isPost()) {
//            $title = $_POST['title'];
//            $content = $_POST['content'];
//            $tags = $_POST['tags'];
//            if ($this -> commentsModel -> create($title, $content, $tags)) {
//                $this -> addInfoMessage ("Post created.");
//                $this -> redirect("posts");
//            } else {
//                $this -> addErrorMessage("Cannot create post.");
//            }
//        }
//    }
//
//    public function edit($id) {
//        if ($this -> isPost()) {
//            // Edit the post in the database
//            $title = $_POST['title'];
//            $content = $_POST['content'];
//            if ($this -> commentsModel -> edit($id, $title, $content)) {
//                $this -> addInfoMessage("Post edited.");
//                $this -> redirect("posts");
//            } else {
//                $this -> addErrorMessage("Cannot edit post.");
//            }
//        }
//
//        // Display edit post form
//        $this -> comment = $this -> commentsModel -> find($id);
//        if (!$this -> comment) {
//            $this -> addErrorMessage("Invalid post.");
//            $this -> redirect("posts");
//        }
//    }
//
//    public function delete($id) {
//        if ($this -> isPost()) {
//
//            // Delete the post in the database
//            $title = $_POST['title'];
//            $content = $_POST['content'];
//            if ($this -> commentsModel -> delete($id)) {
//                $this -> addInfoMessage("Post deleted.");
//                $this -> redirect("posts");
//            } else {
//                $this -> addErrorMessage("Cannot delete post.");
//            }
//        }
//
//        // Display delete post form
//        $this -> comment = $this -> commentsModel -> find($id);
//        if (!$this -> comment) {
//            $this -> addErrorMessage("Invalid post.");
//            $this -> redirect("posts");
//        }
//    }
//}