<?php
ob_start();
// session_start();
include __DIR__ . '/../../partials/toast.php';
?>

<div class="row">
    <div class="col-3 card">
        <ol class="list-group mt-3">
            <a href="/tags" class="text-decoration-none text-dark">
                <li class="list-group-item d-flex justify-content-between align-items-start <?= !isset($_GET['hide']) ?>">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Tất cả thẻ</div>
                        <small>Last updated 3 mins ago</small>
                    </div>
                    <span class="badge text-bg-primary rounded-pill"><?= $total ?></span>
                </li>
            </a>

            <a href="/tags?hide=0" class="text-decoration-none text-dark">
                <li class="list-group-item d-flex justify-content-between align-items-start <?= (isset($_GET['hide']) && $_GET['hide'] == 0)  ?>">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Thẻ khả dụng</div>
                        <small>Last updated 3 mins ago</small>
                    </div>
                    <span class="badge text-bg-primary rounded-pill"><?= $totalVisible ?></span>
                </li>
            </a>

            <a href="/tags?hide=1" class="text-decoration-none text-dark">
                <li class="list-group-item d-flex justify-content-between align-items-start <?= (isset($_GET['hide']) && $_GET['hide'] == 1) ?>">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Thẻ bị đóng</div>
                        <small>Last updated 3 mins ago</small>
                    </div>
                    <span class="badge text-bg-primary rounded-pill"><?= $totalHidden ?></span>
                </li>
            </a>
        </ol>

    </div>
    <div class="mx-4 col-8 card">
        <div class="card-body">
            <strong class="">Danh sách thẻ
            </strong>
            <div class="row mt-3">
                <div class="col-6">
                    <form class="d-flex" role="search" action="/search" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm tài khoản ?" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="col-6 text-end">
                    <a href="/create-tags"><button type="button" class="btn btn-success mb-2">Thêm Thẻ !</button>
                </div></a>
            </div>
            <div class="container py-4">
                <h6>Chi tiết thẻ: <?= htmlspecialchars($tags['name']) ?></h6>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Slug:</strong> <?= htmlspecialchars($tags['slug']) ?></li>
                    <li class="list-group-item"><strong>Trạng thái:</strong>
                        <?php if ($tags['hide'] == 0): ?>
                            <span class="badge bg-success">Đang hoạt động</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Đã đóng</span>
                        <?php endif; ?>
                    </li>
                    <li class="list-group-item"><strong>Ngày tạo:</strong> <?= $tags['created_at'] ?></li>
                    <li class="list-group-item"><strong>Cập nhật:</strong> <?= $tags['updated_at'] ?></li>
                </ul>

                <a href="/tags" class="btn btn-outline-primary mt-3">Quay lại danh sách</a>
            </div>

        </div>
    </div>
</div>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>