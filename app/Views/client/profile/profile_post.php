<?php
ob_start();
$title ="Bài viết của bạn !";
?>
<div class="row">
    <?php
    include("aside.php");
    ?>
    <div class="col-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Têu Đề</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Ngày Đăng</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>
                        <button type="button" class="btn btn-success">Đã Đăng</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Gỡ Bài</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
?>