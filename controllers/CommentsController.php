<?php

class CommentsController extends BaseController {
    private $commentsModel;

    protected function onInit() {
        $this -> title = 'Comments';
        $this -> commentsModel = new CommentsModel();
    }

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

    public function delete($id) {
        if ($this -> isPost()) {

            // Delete the comment in the database
            $post_id = $_POST['post_id'];
            if ($this -> commentsModel -> delete($id)) {
                $this -> addInfoMessage("Comment deleted.");
                $this -> redirect("posts/post/$post_id");
            } else {
                $this -> addErrorMessage("Cannot delete comment.");
            }
        }

        // Display delete post form
        $this -> comment = $this -> commentsModel -> find($id);
        if (!$this -> comment) {
            $this -> addErrorMessage("Invalid post.");
            $this -> redirect("posts");
        }
    }
}