<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';
?>

<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="fa-solid fa-list me-2"></i> Danh mục</h5>
            <small>Cập nhật 3 ngày gần nhất</small>
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
            <a href="/category" class="nav-link mt-2">
                <i class="fa-solid fa-backward"></i> Quản lý trang
            </a>
            <ol class="list-group mt-3">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="?sort=all" class="text-decoration-none text-dark">Tất cả</a></div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="?sort=newest" class="text-decoration-none text-dark">Mới nhất</a></div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="?sort=oldest" class="text-decoration-none text-dark">Cũ nhất</a></div>
                    </div>
                </li>

            </ol>
        </div>
        <div class="mx-4 col-8 card">
            <div class="card-body">
                <strong class="">Danh sách thẻ
                </strong>
                <div class="row mt-3">
                    <div class="col-6">
                        <form class="d-flex" role="search" action="/search-category" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm tài khoản ?" aria-label="Search" name="search">
                            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/create-category"><button type="button" class="btn btn-success mb-2">Thêm Danh Mục !</button>
                    </div></a>
                </div>
                <table class="table table-striped">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th>Ngày Tạo</th>
                            <th>Cập Nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    if (!empty($category)) {
                        foreach ($category as $item) : ?>
                            <tbody>
                                <td><?= $i++ ?></td>
                                <td><a href="/detail-tags?id=<?= $item['id'] ?>" class="nav-link"><?= $item['name'] ?> </a></td>
                                <td><?= $item['note'] ?></td>
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
                                        <a href="/edit-category?id=<?= $item['id'] ?>" class="nav-link text-center">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="/delete-category?id=<?= $item['id'] ?>" class="nav-link text-center">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tbody>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <td colspan="7" class="text-danger text-center">Bạn chưa có danh mục nào.</td>
                    <?php } ?>
                </table>
                <!-- <div class="d-flex justify-content-end mt-4">
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
                </div> -->
            </div>
        </div>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>