<?php
ob_start();
?>
<div class="tabs shadow-lg mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Thêm thẻ</h5>
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
    <form action="/tags-create" method="post">
        <div class="row gx-4">
            <div class="col-8">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Tên thẻ</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="" placeholder="Nhập thẻ..">
                        <div id="emailHelp" class="form-text">Tên không được trùng với thẻ đã được tạo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSlug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="slug">
                        <div id="emailHelp" class="form-text">Tự tạo dựa vào tên.</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Quyền</label>
                        <select class="form-select" aria-label="Default select example" name="hide">
                            <option selected value="0">Hiển Thị</option>
                            <option value="1">Tạm Đóng</option>
                            <option value="2">Bị Khoá</option>
                        </select>
                        <div id="emailHelp" class="form-text">Phân quyền thẻ.</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 shadow-lg">Thêm</button>
            </div>

    </form>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>