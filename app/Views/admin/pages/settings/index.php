<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';
?>
<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Cài đặt</h5>
            <small>Last updated 3 mins ago</small>
        </div>
        <div class="col-6">
            <div class="text-end">
                <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
            </div>
        </div>
    </div>
</div>
<main>
    <div class="row">
        <div class="col-3">
            <div class="card shadow-sm text-center ">
                <div class="card-body">
                    <i class="bi bi-gear-fill me-2 fs-2"></i>
                    <h5 class="card-title">Cài đặt Website</h5>
                    <small>Thay đổi thông tin website của bạn !</small>
                    <br>
                    <a href="/settings_web" class="btn btn-primary">Cài đặt</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-lg text-center ">
                <div class="card-body">
                    <i class="fa-solid fa-chart-line text-success fs-2 p-2"></i>
                    <h5 class="card-title">Cài đặt SEO</h5>
                    <small>Thay đổi thông tin tối ưu SEO của bạn !</small>
                    <br>
                    <a href="/settings_web" class="btn btn-primary">Cài đặt</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-lg text-center ">
                <div class="card-body">
                    <i class="fa-solid fa-phone fs-2 p-2"></i>
                    <h5 class="card-title">Thông tin liên hệ (nc)</h5>
                    <small>Thay đổi thông tin liên hệ của bạn !</small>
                    <br>
                    <a href="/settings_web" class="btn btn-primary">Cài đặt</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>