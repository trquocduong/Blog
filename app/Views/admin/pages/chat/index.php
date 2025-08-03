<?php
ob_start();
// session_start();
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
            <h5><i class="bi bi-tags-fill me-2"></i>Chat với Admin</h5>
            <small>Last updated 3 mins ago</small>
        </div>
        <div class="col-6">
            <div class="text-end">
                <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
            </div>
        </div>
    </div>


</div>
<div class="container mt-4">

    <div class="row">
        <div class="col-3">
            <h6>Chọn admin để bắt đầu chat</h6>
            <ul class="list-group p-2">

                <?php foreach ($users as $user): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/chat/room?with=<?= $user['id'] ?>">
                            <?= $user['name'] ?>
                        </a>
                        <?php if (isOnline($user['last_active'])): ?>
                            <span class="badge bg-success"> </span>
                        <?php else: ?>
                            <span class="badge bg-secondary"> </span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
        <div class="mx-4 col-8 card">
            <div class="card-body">
                <strong class="">Khung chat
            </div>
        </div>
    </div>

</div>


<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>