<?php require_once 'Views/head.php'; ?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Description</th>
    </tr>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->getId() ?></td>
            <td><?= $post->getDescription() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>