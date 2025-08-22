<?php
ob_start();
$title = "Bài viết của bạn !";
?>
<div class="row">
    <?php
    include("aside.php");
    ?>
    <div class="col-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Têu Đề</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Ngày Đăng</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($post as $item): ?>
                    <tr>
                        <th scope="row"><?= ++$i ?></th>
                        <td><img src="<?= $item['thumbnail'] ?>" alt="" width="70px" height="50px"></td>
                        <td><?= htmlspecialchars($item['title']) ?></td>
                        <td><?= htmlspecialchars($item['author'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($item['created_at'] ?? '') ?></td>
                        <td>
                            <?php if ($item['status'] === 'published'): ?>
                                <button type="button" class="btn btn-success">Đã Đăng</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-secondary">Nháp</button>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger">Gỡ Bài</button>
                        </td>
                    </tr>
                <?php endforeach ?>


            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
?>