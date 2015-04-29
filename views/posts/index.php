<h1>List of Authors</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach ($this -> posts as $post) : ?>
        <tr>
            <td><?= htmlspecialchars($post['post_id']) ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= htmlspecialchars($post['content']) ?></td>
            <td><a href="/posts/edit/<?=$post['post_id'] ?>">[Edit]</td>
            <td><a href="/posts/delete/<?=$post['post_id'] ?>">[Delete]</td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/posts/create">[Create New]</a>
