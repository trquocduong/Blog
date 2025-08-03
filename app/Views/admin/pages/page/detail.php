<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';
include __DIR__ . '/../../partials/link_client.php';

?>
<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Chi Tiết Trang</h5>
            <small>Last updated 3 mins ago</small>
        </div>
        <div class="col-6">
            <div class="text-end">
                <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
            </div>
        </div>
    </div>


</div>
<div class="row align-items-start">
    <div class="col-3 card ">
        <div class="mt-3">
            <h5>Tiêu đề: <strong><?= htmlspecialchars($pages['title']) ?></strong></h5>
        </div>
        <div class="mt-3">
            <p><strong>Slug (Đường dẫn ): </strong>
                <br><?= htmlspecialchars($pages['slug']) ?>
            </p>
        </div>
        <div class="mt-2">
            <p><strong>Trạng thái: </strong>

            </p>
            <?php if ($pages['hide'] === "0" || $pages['hide'] === 0): ?>
                <span class="badge bg-success">Đang hoạt động</span>
            <?php else: ?>
                <span class="badge bg-secondary">Đã đóng</span>
            <?php endif; ?>
        </div>
        <div class="mt-2">
            <p><strong>Tiêu đề SEO: </strong>
                <br><?= htmlspecialchars($pages['seo_title']) ?>
            </p>
        </div>
        <div class="mt-3">
            <p><strong>SEO description: </strong>
                <br><?= htmlspecialchars($pages['seo_description']) ?>
            </p>
        </div>
        <div class="mt-4">
            <small class="text-muted">Ngày tạo: <?= $pages['created_at'] ?> <br> Cập nhật: <?= $pages['updated_at'] ?></small>
        </div>
        <a href="/pages" class="btn btn-outline-primary mt-3 mb-5">Quay lại danh sách</a>
    </div>
    <div class="mx-4 col-8 card">
        <div class="card-body">
            <strong class="">Giao diện xem trước
            </strong>

            <div class="container py-4">
                <div class="mt-3" style="max-height: 500px; overflow-y: auto; padding-right: 10px;">
                    <?= $pages['content'] ?>
                </div>
            </div>



        </div>
    </div>
</div>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>