<?php
ob_start();
// session_start();
include __DIR__ . '/../../partials/toast.php';
?>

<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Thẻ</h5>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Thẻ</th>
                            <th>Slug</th>
                            <th>Trạng thái</th>
                            <th>Ngày Tạo</th>
                            <th>Cập Nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <?php
                    $i = 1;
                    foreach ($tags as $item) : ?>
                        <tbody>
                            <td><?= $i++ ?></td>
                            <td><a href="/detail-tags?slug=<?= $item['slug'] ?>" class="nav-link"><?= $item['name'] ?> </a></td>
                            <td><?= $item['slug'] ?></td>
                            <td>
                                <?php if ($item['hide'] === "0" || $item['hide'] === 0): ?>
                                    <span class="badge bg-success">Đang hoạt động</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Đã đóng</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $item['created_at'] ?></td>
                            <td><?= $item['updated_at'] ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/edit-tags?slug=<?= $item['slug'] ?>" class="nav-link text-center">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="/delete-tags?slug=<?= $item['slug'] ?>" class="nav-link text-center">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <!-- <?php if (Middleware::checkPermissionSilent('delete_tabs')): ?>
                                        <form action="/delete-tags" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá?');" style="display:inline;">
                                            <input type="hidden" name="slug" value="<?= htmlspecialchars($item['slug']) ?>">
                                            <button type="submit" class="btn btn-link nav-link text-center p-0" style="border: none; background: none;">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?> -->

                                </div>
                            </td>


                        </tbody>
                    <?php endforeach; ?>

                </table>
                <div class="d-flex justify-content-end mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm">
                            <?php if ($currentPage <= 1): ?>
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fa-solid fa-arrow-left"></i></span>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $currentPage - 1 ?>"><i class="fa-solid fa-arrow-left"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
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