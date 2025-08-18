<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';

function isOnline($last_active, $threshold = 60)
{
    if (!$last_active) return false;
    $last = strtotime($last_active);
    $now = time();
    return ($now - $last) <= $threshold;
}
?>

<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-chat-dots me-2"></i>Chat giữa các Admin</h5>
            <small>Cập nhật trạng thái hoạt động</small>
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-dark"><i class="fa-solid fa-star"></i></button>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <!-- Cột trái: danh sách admin -->
        <div class="col-3">
            <h6 class="mt-2">Danh sách Admin</h6>

            <ul class="list-group shadow-sm">
                <?php foreach ($users as $user): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <img src="<?= htmlspecialchars($user['img']) ?>" width="50" height="50" alt="Avatar" style="border-radius: 20%;">

                        <div class="user-info">
                            <span class="fw-semibold mb-2"> <a href="/room?with=<?= $user['id'] ?>" class="nav-link">
                                    <?= $user['name'] ?>
                                </a></span>
                            <span class="text-muted small">
                                <?= strlen($user['email']) > 15 ? substr($user['email'], 0, 11) . '...' : $user['email'] ?>
                            </span>
                        </div>
                        <span class="badge <?= isOnline($user['last_active']) ? 'bg-success' : 'bg-secondary' ?>">
                            <?= isOnline($user['last_active']) ? '' : '' ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-8 card mx-4 shadow-sm">
            <div class="card-body text-center ">
                <img src="uploads/avt_chat.png" alt="" width="200px" height="200px">
                <p> <strong>Hãy bắt đầu đoạn chat của bạn !</strong></p>

            </div>

        </div>
    </div>
</div>

<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>