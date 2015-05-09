<section class="col-xs-12 col-md-6 col-lg-8">
    <h1>Delete Existing Post</h1>

    <?php if ($this -> post) { ?>
        <form method="post" action="/posts/delete/<?= $this -> post['post_id'] ?>">
            <p>Are you sure You want to delete this post?</p>
            Post title:
            <input type="text" name="title"
                   value="<?= htmlspecialchars($this->post['title']) ?>" readonly/>
            <br/>
            Post content:
            <input type="text" name="content"
                   value="<?= htmlspecialchars($this->post['content']) ?>" readonly/>
            <br/>
            <input type="submit" value="Delete" />
            <a href="/posts">Cancel</a>
        </form>
    <?php } ?>
</section>

<?php include_once('views/layouts/default/aside.php'); ?>