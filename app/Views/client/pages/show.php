<?php
$title = htmlspecialchars($page['title']);

ob_start();
?>
<div class="container py-4">
    <?php if (!empty($page)) : ?>
        <h1 class="mb-4"><?= htmlspecialchars($page['title']) ?></h1>
        <div class="page-content">
            <?= $page['content'] ?>
        </div>
    <?php else : ?>
        <div class="alert alert-warning">
            Trang không tồn tại hoặc đã bị xóa.
        </div>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
