<?php include_once __DIR__.'/../includes/header.php'; ?>
<article>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><i><?= $post['created_at'] ?></i></p>
    <div><?= $post['content'] ?></div>
</article>
<?php include_once __DIR__.'/../includes/footer.php'; ?>
