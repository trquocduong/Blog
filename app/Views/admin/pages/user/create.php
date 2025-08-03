<?php
ob_start();
?>
<div class="tabs shadow-lg mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Thêm tài khoản</h5>
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
    <form action="/user_store" method="post">
        <div class="row gx-4">
            <div class="col-8">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="Nhập tên..">
                        <div id="emailHelp" class="form-text">Tên của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="" placeholder="Nhập email..">
                        <div id="emailHelp" class="form-text">Email không được trùng với email đã được tạo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhone" class="form-label">Số điện thoại.</label>
                        <input type="text" class="form-control" name="phone" id="phone" aria-describedby="" placeholder="Nhập SĐT..">
                        <div id="emailHelp" class="form-text">Số điện thoại liên lạc của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" name="password" id="" aria-describedby="" placeholder="Mật khẩu của bạn..">
                        <div id="emailHelp" class="form-text">Mật khẩu đăng nhập</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleInputPer" class="form-label">Quyền</label>
                        <select class="form-select" aria-label="Default select example" name="hide">
                            <option selected value="0">Hiển Thị</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Tạm Đóng</option>
                        </select>
                        <div id="emailHelp" class="form-text">Phân quyền tài khoản.</div>
                    </div>
                </div>
                <?php if (Middleware::checkPermissionSilent('role_user')): ?>
                    <div class="card p-3 shadow-sm mt-3">
                        <div class="mb-3">
                            <label for="exampleInputRole" class="form-label">Vai trò</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option value="0">Admin</option>
                                <option selected value="1">Khách hàng</option>
                            </select>
                            <div id="emailHelp" class="form-text">Vai trò tài khoản.</div>
                        </div>
                    </div>
                <?php endif; ?>
    </form>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>