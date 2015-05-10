<h1>COMMENT IN POST FOLDER</h1>
<article class="col-xs-12 col-md-12 col-lg-12 post-short">
    <form method="post" action="/posts/comment/<?=$this -> post['post_id'] ?>">
        <div class="main-part">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="content">Enter Your Name: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <input type="text" name="author" class="inputs"/>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <input type="hidden" name="post_id" value="<?= htmlspecialchars($this -> post['post_id']) ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="content">Comment Content: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <textarea name="content" cols="30" rows="10" class="inputs"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <button type="submit" class="btn-default">Post Comment</button>
            </div>
        </div>
    </form>

    <div class="col-xs-12 col-md-12 col-lg-12">
        <form class="form-buttons" action="/posts/post/<?= $this -> post['post_id'] ?>">
            <button type="submit" class="btn-default">Cancel</button>
        </form>
    </div>
</article>