<section class="col-xs-12 col-md-6 col-lg-8">
        <article class="col-xs-12 col-md-12 col-lg-12 post-short">
            <header class="col-xs-12 col-md-12 col-lg-12">
                <h1><?= htmlspecialchars($this -> post['title']) ?></h1>
                <h2>Author: <?= htmlspecialchars($this -> post['author']) ?></h2>
                <h2 class="glyphicon glyphicon-time"><span><?= htmlspecialchars($this -> post['created_on']) ?></span></h2>
                <h2 class="glyphicon glyphicon-comment"><span><a href="">Leave A Comment</a></span></h2>
            </header>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <!--                        TODO: limit the content to 150 symbols-->
                <p><?= htmlspecialchars($this -> post['content']) ?></p>
            </div>
            <footer>
                <h2 class="glyphicon glyphicon-flag"><span>Visits: <?= htmlspecialchars($this -> post['visits']) ?></span></h2>
                <h2 class="glyphicon glyphicon-tags"><span>Tags: <?= htmlspecialchars($this -> post['tags']) ?></span></h2>
            </footer>

            <div class="col-xs-12 col-md-6 col-lg-6">
                <form class="form-buttons" action="/posts/edit/<?=$this -> post['post_id'] ?>">
                    <button type="submit" class="btn-default">Edit Post</button>
                </form>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6">
                <form class="form-buttons" action="/posts/delete/<?=$this -> post['post_id'] ?>">
                    <button type="submit" class="btn-default">Delete Post</button>
                </form>
            </div>
        </article>
</section>