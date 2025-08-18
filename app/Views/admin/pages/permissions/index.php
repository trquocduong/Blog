<?php
ob_start();
// session_start();
include __DIR__ . '/../../partials/toast.php';

?>

<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-people-fill me-2"></i> Quyền</h5>
            <small>Last updated 3 mins ago</small>
        </div>
        <div class="col-6">
            <div class="text-end">
                <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
            </div>
        </div>
    </div>


</div>
<main class="main">
    <div class="row">
        <div class="col-3 card">
            <ol class="list-group mt-3">
                <a href="/permissions" class="text-decoration-none text-dark">
                    <li class="list-group-item d-flex justify-content-between align-items-start <?= !isset($_GET['hide']) ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Tất cả quyền</div>
                            <small>Last updated 3 mins ago</small>
                        </div>
                        <span class="badge text-bg-primary rounded-pill"><?= $total ?></span>
                    </li>
                </a>

                <a href="/permissions?hide=0" class="text-decoration-none text-dark">
                    <li class="list-group-item d-flex justify-content-between align-items-start <?= (isset($_GET['hide']) && $_GET['hide'] == 0)  ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Quyền khả dụng</div>
                            <small>Last updated 3 mins ago</small>
                        </div>
                        <span class="badge text-bg-primary rounded-pill"><?= $totalVisible ?></span>
                    </li>
                </a>

                <a href="/permissions?hide=1" class="text-decoration-none text-dark">
                    <li class="list-group-item d-flex justify-content-between align-items-start <?= (isset($_GET['hide']) && $_GET['hide'] == 1) ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Quyền bị đóng</div>
                            <small>Last updated 3 mins ago</small>
                        </div>
                        <span class="badge text-bg-primary rounded-pill"><?= $totalHidden ?></span>
                    </li>
                </a>
            </ol>
        </div>
        <div class="mx-4 col-8 card">
            <div class="card-body">
                <strong class="">Danh sách quyền
                </strong>
                <div class="row mt-3">
                    <div class="col-6">
                        <form class="d-flex" role="search" action="/search" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm quyền ?" aria-label="Search" name="search">
                            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/permissions_create"><button type="button" class="btn btn-success mb-2">Thêm Quyền !</button>
                    </div></a>
                </div>


                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên quyền</th>
                            <th>Key code</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($permissions)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-danger">Không có thẻ nào được tìm thấy.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($permissions as $per): ?>

                                <tr>
                                    <td><?= $per['id'] ?></td>
                                    <td><?= $per['name'] ?></td>
                                    <td><?= $per['key_code'] ?></td>
                                    <td class="text-center">
                                        <?php if ($per['hide'] === "0" || $per['hide'] === 0): ?>
                                            <span class="badge bg-success">Đang hoạt động</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Đã đóng</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/permissions/hide?id=<?= $per['id'] ?>">
                                            <?= $per['hide'] ? 'Hiện lại' : 'Ẩn' ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <a href="/permissions_index" style="display:inline-block;margin-top:20px">→ Quản lý phân quyền người dùng</a>

                <div class="d-flex justify-content-end mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm">
                            <!-- Nút Lùi -->
                            <?php if ($currentPage <= 1): ?>
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fa-solid fa-arrow-left"></i></span>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $currentPage - 1 ?>"><i class="fa-solid fa-arrow-left"></i></a>
                                </li>
                            <?php endif; ?>

                            <!-- Số trang -->
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Nút Tiến -->
                            <?php if ($currentPage >= $totalPages): ?>
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fa-solid fa-arrow-right"></i></span>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $currentPage + 1 ?>"><i class="fa-solid fa-arrow-right"></i></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>