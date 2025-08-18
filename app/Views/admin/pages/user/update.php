<?php
ob_start();
?>
<div class="tabs shadow-lg mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Thay đổi thông tin tài khoản.</h5>
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
    <form action="/user_update?id=<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="row gx-4">
            <div class="col-8">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="" value="<?= $user['name'] ?>">
                        <div id="emailHelp" class="form-text">Tên của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="" value="<?= $user['email'] ?>">
                        <div id="emailHelp" class="form-text">Email không được trùng với email đã được tạo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhone" class="form-label">Số điện thoại.</label>
                        <input type="text" class="form-control" name="phone" id="phone" aria-describedby="" value="<?= $user['phone'] ?>">
                        <div id="emailHelp" class="form-text">Số điện thoại liên lạc của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" name="password" id="" aria-describedby="" placeholder="....">
                        <div id="emailHelp" class="form-text">Mật khẩu đăng nhập</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 shadow-lg">Sửa</button>
            </div>
            <div class="col-4">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleInputPer" class="form-label">Quyền</label>
                        <select class="form-select" name="hide">
                            <option value="0" <?= $user['hide'] == 0 ? 'selected' : '' ?>>Hiển Thị</option>
                            <option value="1" <?= $user['hide'] == 1 ? 'selected' : '' ?>>Chờ Duyệt</option>
                            <option value="2" <?= $user['hide'] == 2 ? 'selected' : '' ?>>Bị Khoá</option>
                        </select>
                        <div id="emailHelp" class="form-text">Phân quyền tài khoản.</div>
                    </div>
                </div>
                <?php if (Middleware::checkPermissionSilent('role_user')): ?>
                    <div class="card p-3 shadow-sm mt-3">
                        <div class="mb-3">
                            <label for="exampleInputRole" class="form-label">Vai trò</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Admin</option>
                                <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Khách hàng</option>
                            </select>
                            <div id="emailHelp" class="form-text">Vai trò tài khoản.</div>
                        </div>
                    </div>
                    <div class="card p-3 shadow-lg mt-3 mb-3">
                        <label for="exampleInputRole" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="img" accept="image/*">
                        <div class="text-center">
                            <img src="<?= htmlspecialchars($user['img']) ?>" width="100" height="100" alt="Avatar" class="mt-2 shadow-lg text-center">
                        </div>
                    </div>

            </div>
        <?php endif ?>
    </form>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>