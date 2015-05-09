<section class="col-xs-12 col-md-6 col-lg-8">
    <article class="col-xs-12 col-md-12 col-lg-12 post-short">
        <form method="post" action="/posts/edit/<?= $this -> post['post_id'] ?>">
            <div class="main-part">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <label for="title">Post Title: </label>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-8">
                        <input type="text" name="title" class="inputs" value="<?= htmlspecialchars($this->post['title']) ?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <label for="content">Post Content: </label>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-8">
                        <textarea name="content" id="" cols="30" rows="10" class="inputs"><?= htmlspecialchars($this->post['content']) ?></textarea>
                    </div>
                </div>
<!--                <div class="row">-->
<!--                    <div class="col-xs-12 col-md-6 col-lg-4">-->
<!--                        <label for="tags">Tags: </label>-->
<!--                    </div>-->
<!--                    <div class="col-xs-12 col-md-6 col-lg-8">-->
<!--                        <input type="text" name="tags" class="inputs"/>-->
<!--                    </div>-->
<!--                </div>-->
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn-default">Edit Post</button>
                </div>
            </div>
        </form>

        <div class="col-xs-12 col-md-12 col-lg-12">
            <form class="form-buttons" action="/posts/post/<?= $this -> post['post_id'] ?>">
                <button type="submit" class="btn-default">Cancel</button>
            </form>
        </div>
    </article>
</section>