<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';
?>
<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5> <i class="bi bi-image-fill me-2"></i>Media</h5>
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
        <div class="mx-4 col-12 card">
            <div class="card-body">
                <strong class="">Danh sách media
                </strong>
                <div class="row mt-3">
                    <div class="col-6">
                        <form class="d-flex" action="/media-search" method="GET">
                            <input class="form-control me-2" type="search" name="q"
                                placeholder="Tìm kiếm tài khoản ?" aria-label="Search"
                                value="<?= $_GET['q'] ?? '' ?>">
                            <button class="btn btn-outline-success" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ảnh </th>
                            <th>Đường dẫn</th>
                            <th>type</th>
                            <th>alt </th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php if (!empty($media)): ?>
                        <?php
                        $i = 1;
                        foreach ($media as $item) : ?>
                            <tbody>
                                <td><?= $i++ ?></td>
                                <td>
                                    <img src="public/<?= htmlspecialchars($item['file_path']) ?>"
                                        alt="<?= htmlspecialchars($item['alt_text']) ?>"
                                        style="max-width:100px;">
                                </td>

                                <td><?= $item['file_path'] ?></td>
                                <td><?= $item['file_type'] ?></td>
                                <td><?= $item['alt_text'] ?></td>
                                <td class="text-center">
                                    <?= $item['created_at'] ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/media_delete?id=<?= $item['id'] ?>" class="nav-link text-center">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tbody>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-danger">Không tìm thấy media</td>
                        </tr>
                    <?php endif; ?>
                </table>

            </div>
        </div>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>