<?php
ob_start();

include __DIR__ . '/../../partials/toast.php';
?>
<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Phân Quyền</h5>
            <small>Cập nhật quyền cho các tài khoản admin.</small>
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

        <div class="col-12 card">
            <div class="card-body">
                <div class="mb-2">
                    <strong class="">Phân quyền người dùng
                    </strong>
                </div>
                <?php
                $perPermissions = array_filter($permissions, fn($p) => str_contains($p['key_code'], 'per'));
                $tagPermissions = array_filter($permissions, fn($p) => str_contains($p['key_code'], 'tags'));
                $pagePermissions = array_filter($permissions, fn($p) => str_contains($p['key_code'], 'page'));
                $usersPermissions = array_filter($permissions, fn($p) => str_contains($p['key_code'], 'user'));

                ?>

                <form method="GET">
                    <label>Chọn tài khoản:</label>
                    <select name="user_id" onchange="this.form.submit()">
                        <option value="">-- Chọn user --</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user['id'] ?>" <?= $selectedUserId == $user['id'] ? 'selected' : '' ?>>
                                <?= $user['email'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>

                <?php if ($selectedUserId): ?>
                    <form method="POST" action="/permissions_update">
                        <input type="hidden" name="user_id" value="<?= $selectedUserId ?>">
                        <h5 class="mt-4"><strong>Chọn quyền cho user</strong></h5>
                        <div class="row g-3">
                            <div class="col-md-3 ">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        <strong>Quyền tất cả !</strong><br>
                                        <small>Dành cho admin tổng.</small>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($perPermissions as $per): ?>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="<?= $per['id'] ?>"
                                                    id="permission<?= $per['id'] ?>"
                                                    <?= in_array($per['id'], $userPermissions) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="permission<?= $per['id'] ?>">
                                                    <?= $per['name'] ?> <code>(<?= $per['key_code'] ?>)</code>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        Quyền QL User
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($usersPermissions as $per): ?>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="<?= $per['id'] ?>"
                                                    id="permission<?= $per['id'] ?>"
                                                    <?= in_array($per['id'], $userPermissions) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="permission<?= $per['id'] ?>">
                                                    <?= $per['name'] ?> <code>(<?= $per['key_code'] ?>)</code>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Card quyền TAG -->
                            <div class="col-md-3 ">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        Quyền Thẻ (Tag)<br>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input select-all" data-target="tag"> Chọn tất cả
                                        </label>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($tagPermissions as $per): ?>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input group-tag" type="checkbox" name="permissions[]"
                                                    value="<?= $per['id'] ?>"
                                                    id="permission<?= $per['id'] ?>"
                                                    <?= in_array($per['id'], $userPermissions) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="permission<?= $per['id'] ?>">
                                                    <?= $per['name'] ?> <code>(<?= $per['key_code'] ?>)</code>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 ">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        Quyền Trang (Page)
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($pagePermissions as $per): ?>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="<?= $per['id'] ?>"
                                                    id="permission<?= $per['id'] ?>"
                                                    <?= in_array($per['id'], $userPermissions) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="permission<?= $per['id'] ?>">
                                                    <?= $per['name'] ?> <code>(<?= $per['key_code'] ?>)</code>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
                    </form>
                <?php endif; ?>


            </div>
        </div>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>