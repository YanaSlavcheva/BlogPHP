<section class="col-xs-12 col-md-6 col-lg-8">
    <article class="col-xs-12 col-md-12 col-lg-12 post-short">
        <form method="post" action="/posts/delete/<?= $this -> post['post_id'] ?>">
            <div class="main-part">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <label for="title">Post Title: </label>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-8">
                        <input type="text" name="title" class="inputs" value="<?= htmlspecialchars($this->post['title']) ?>" readonly/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <label for="content">Post Content: </label>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-8">
                        <textarea name="content" id="" cols="30" rows="10" class="inputs" readonly><?= htmlspecialchars($this->post['content']) ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn-default">Delete Post</button>
                </div>
            </div>
        </form>

        <div class="col-xs-12 col-md-12 col-lg-12">
            <form class="form-buttons" action="/posts">
                <button type="submit" class="btn-default">Cancel</button>
            </form>
        </div>
    </article>
</section>