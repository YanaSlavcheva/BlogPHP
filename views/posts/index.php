<div class="col-xs-12 col-md-12 col-lg-12">
    <form action="/posts/create">
        <button type="submit" class="btn-default  create-button">Create New Post</button>
    </form>
</div>

<?php
foreach ($this -> posts as $post) : ?>
    <article class="col-xs-12 col-md-12 col-lg-12 post-short">
        <header class="col-xs-12 col-md-12 col-lg-12">
            <h1><a href="/posts/post/<?=$post['post_id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h1>
            <h2>Author: <?= htmlspecialchars($post['author']) ?></h2>
            <h2 class="glyphicon glyphicon-time"><span><?= htmlspecialchars($post['created_on']) ?></span></h2>
        </header>
        <div class="col-xs-12 col-md-12 col-lg-12">
            <!--                        TODO: limit the content to 150 symbols-->
            <p><?= htmlspecialchars($post['content']) ?></p>
        </div>
        <footer>
            <h2 class="glyphicon glyphicon-flag"><span>Visits: <?= htmlspecialchars($post['visits']) ?></span></h2>
            <h2 class="glyphicon glyphicon-tags"><span>Tags: <?= htmlspecialchars($post['tags']) ?></span></h2>
        </footer>
<!--            <div class="col-xs-12 col-md-6 col-lg-6">-->
<!--                <form class="form-buttons" action="/posts/edit/--><?//=$post['post_id'] ?><!--">-->
<!--                    <button type="submit" class="btn-default">Edit Post</button>-->
<!--                </form>-->
<!--            </div>-->
<!---->
<!--            <div class="col-xs-12 col-md-6 col-lg-6">-->
<!--                <form class="form-buttons" action="/posts/delete/--><?//=$post['post_id'] ?><!--">-->
<!--                    <button type="submit" class="btn-default">Delete Post</button>-->
<!--                </form>-->
<!--            </div>-->
    </article>
<?php endforeach ?>
