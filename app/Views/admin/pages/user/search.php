<?php ob_start(); ?>
<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>
                <?php
                switch ($filter) {
                    case 'search':
                        echo "Kết quả tìm kiếm: Tài khoản ";
                        break;
                    case 'newest':
                        echo "Danh sách thẻ mới nhất";
                        break;
                    case 'oldest':
                        echo "Danh sách thẻ cũ nhất";
                        break;
                    default:
                        echo "Tất cả thẻ";
                        break;
                }
                ?>
            </h5>
            <small>Cập nhật lần cuối 3 phút trước</small>
        </div>
        <div class="col-6">
            <div class="text-end">
                <button type="button" class="btn btn-dark">
                    <i class="fa-solid fa-star" style="color: white;"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<main class="main">
    <div class="row">
        <!-- Sidebar bộ lọc -->
        <div class="col-3 card">
            <a href="/users" class="nav-link mt-2">
                <i class="fa-solid fa-backward"></i> Quay lại danh sách
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

        <!-- Nội dung chính -->
        <div class="mx-4 col-8 card">
            <div class="card-body">
                <strong>
                    <?php
                    switch ($filter) {
                        case 'search':
                            echo "Kết quả tìm kiếm thẻ!";
                            break;
                        case 'newest':
                            echo "Thẻ mới nhất!";
                            break;
                        case 'oldest':
                            echo "Thẻ cũ nhất!";
                            break;
                        default:
                            echo "Tất cả thẻ!";
                            break;
                    }
                    ?>
                </strong>

                <!-- Form tìm kiếm -->
                <div class="row mt-3">
                    <div class="col-6">
                        <form class="d-flex" role="search" action="" method="POST">
                            <input class="form-control me-2" type="search" name="search"
                                placeholder="Tìm kiếm tài khoản ?" aria-label="Search"
                                value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>">
                            <button class="btn btn-outline-success" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/create-tags">
                            <button type="button" class="btn btn-success mb-2">Thêm Thẻ !</button>
                        </a>
                    </div>
                </div>

                <!-- Bảng danh sách -->
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Mật khẩu</th>
                            <th>Trạng thái</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $item): ?>
                            <?php $i = 1; ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td>***</td>
                                <td>
                                    <?php if ($item['hide'] === "0" || $item['hide'] === 0): ?>
                                        <span class="badge bg-success">Đang hoạt động</span>
                                    <?php elseif ($item['hide'] === "1" || $item['hide'] === 1): ?>
                                        <span class="badge bg-warning">Chờ duyệt</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Bị khoá</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($item['role'] === "0" || $item['hide'] === 0): ?>
                                        <span class="badge bg-success">Admin</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Khách hàng</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/user_edit?id=<?= $item['id'] ?>" class="nav-link text-center">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="/user_delete?id=<?= $item['id'] ?>" class="nav-link text-center">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($user)): ?>
                            <tr>
                                <td colspan="6" class="text-center text-danger">Không tìm thấy kết quả.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Pagination nếu có -->
                <div class="d-flex justify-content-end mt-4">
                    <!-- pagination logic ở đây nếu dùng -->
                </div>
            </div>
        </div>
    </div>
</main>

<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>