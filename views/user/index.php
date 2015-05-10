<?php
foreach ($this -> users as $user) : ?>
    <article class="col-xs-12 col-md-12 col-lg-12 post-short">
        <h1 class="glyphicon glyphicon-envelope inline-block"><span><a href="mailto: yana.slavcheva@gmail.com"><?= htmlspecialchars($user['email']) ?></span></a></h1>
        <h1 class="inline-block"><span><a href="https://github.com/YanaSlavcheva/BlogPHP" target="_blank">Project's GitHub</a></span></h1>
    </article>
<?php endforeach ?>