<?php

class CommentsController extends BaseController {
    private $commentsModel;

    protected function onInit() {
        $this -> title = 'Comments';
        $this -> commentsModel = new CommentsModel();
    }

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

    public function edit($id) {
        if ($this -> isPost()) {
            // Edit the comment in the database
            $content = $_POST['content'];
            $post_id = $_POST['post_id'];
            if ($this -> commentsModel -> edit($id, $content)) {
                $this -> addInfoMessage("Comment edited.");
                $this -> redirect("posts/post/$post_id");
            } else {
                $this -> addErrorMessage("Cannot edit comment.");
            }
        }

        // Display edit comment form
        $this -> comment = $this -> commentsModel -> find($id);
        if (!$this -> comment) {
            $this -> addErrorMessage("Invalid comment.");
            $this -> redirect("comment");
        }
    }

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
}