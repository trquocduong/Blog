<?php
ob_start();
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
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();

include __DIR__ . '/../main/main.php';
?>