<?php
ob_start();
$title = "Bài viết của bạn !";
?>
<div class="container py-4">
    <div class="row">
        <?php
        include("aside.php");
        ?>
        <div class="col-8">
            <main class="main">
                <form action="/profile_edit?id=<?= $users['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row gx-4">
                        <div class="col-8">
                            <div class="card p-3 shadow-sm">
                                <h4 class="text-center mb-3">Cập nhật thông tin của bạn.</h4>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Tên tài khoản</label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="" value="<?= $users['name'] ?>">
                                    <div id="emailHelp" class="form-text">Cập nhật lại tên của bạn.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" aria-describedby="" value="<?= $users['email'] ?>">
                                    <div id="emailHelp" class="form-text">Cập nhật email mới của bạn.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPhone" class="form-label">Số điện thoại.</label>
                                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="" value="<?= $users['phone'] ?>">
                                    <div id="emailHelp" class="form-text">Số điện thoại liên lạc của bạn.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card p-3 shadow-lg mt-3 mb-3 ">
                                <label for="exampleInputRole" class="form-label">Ảnh đại diện</label>
                                <input type="file" name="img" accept="image/*">
                                <div class="img d-flex justify-content-center align-items-center p-2">
                                    <img src="<?= $users['img'] ?>" alt="" style="width:150px;height:150px" class="rounded-circle img-fluid ">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 shadow-lg">Sửa thông tin</button>
                        </div>
                </form>
            </main>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
