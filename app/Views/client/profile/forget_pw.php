<?php
$title = "Thông tin cá nhân của bạn !";
include __DIR__ . '/../../admin/partials/toast.php';
ob_start();
?>

<div class="container py-4">
    <div class="row">
        <?php
        include("aside.php");
        ?>
        <div class="col-8">
            <form action="/forget_password?id=<?= $users['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="row gx-4">
                    <div class="col-8">
                        <div class="card p-3 shadow-sm">
                            <h4 class="text-center mb-3">Cập nhật mật khẩu.</h4>
                            <?php $error ?>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Nhập mật khẩu hiện tại</label>
                                <input type="password" class="form-control" name="old_pw" id="old_pw" aria-describedby="">
                                <div id="emailHelp" class="form-text">Vui lòng nhập lại mật khẩu.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="">
                                <div id="emailHelp" class="form-text">Vui lòng nhập mật khẩu mới</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" name="repassword" id="repassword" aria-describedby="">
                                <div id="emailHelp" class="form-text">Vui lòng nhập mật khẩu mới</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-4">

                        <button type="submit" class="btn btn-primary mt-3 shadow-lg">Sửa thông tin</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
?>