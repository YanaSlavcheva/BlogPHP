<div>
    <ul>
        <?php foreach ($this -> posts as $post): ?>
            <li><a href="/posts/post/<?=$post[0] ?>"><h4><?php echo $post[1] ?></h4></a></li>
        <?php endforeach ?>
    </ul>
</div>