<section class="col-xs-12 col-md-6 col-lg-8">
    <h1>Edit Existing Post</h1>

    <?php if ($this -> post) { ?>
        <form method="post" action="/posts/edit/<?= $this -> post['post_id'] ?>">
            Post title:
            <input type="text" name="title"
                   value="<?= htmlspecialchars($this->post['title']) ?>" />
            <br/>
            Post content:
            <input type="text" name="content"
                   value="<?= htmlspecialchars($this->post['content']) ?>" />
            <br/>
            <input type="submit" value="Edit" />
            <a href="/posts">Cancel</a>
        </form>
    <?php } ?>
</section>

<?php include_once('views/layouts/default/aside.php'); ?>
