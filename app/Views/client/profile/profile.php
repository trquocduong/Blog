<?php
$title = "Thông tin cá nhân của bạn !";

ob_start();
?>

<div class="container py-4">
    <div class="row">
        <?php
        include("aside.php");
        ?>
        <div class="col-8">

            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="<?= $users['img'] ?>"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                                    <h5 class="my-3 fw-bold"><?= $users['name'] ?></h5>

                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn text-light" style="background-color: var(--main-color)"><a href="profile_update?id=<?= $users['id'] ?>" class="nav-link"> Sửa thông tin</a></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Họ và tên</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $users['name'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $users['email'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">SĐT</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $users['phone'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Mật khẩu</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0 ms-2"> *********</p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
?>