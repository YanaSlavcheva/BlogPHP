<section class="col-xs-12 col-md-6 col-lg-8">
    <h1>Create New Post</h1>

    <form method="post" action="/posts/create">
        Post title: <input type="text" name="title" />
        <br/>
        Post content: <input type="text" name="content" />
        <br/>
        Tags: <input type="text" name="tags" />
        <br/>

        <button type="submit" class="btn-success">Create</button>
        <button class="btn-danger"><a href="/posts">Cancel</a></button>
    </form>
</section>

<?php include_once('views/layouts/default/aside.php'); ?>
