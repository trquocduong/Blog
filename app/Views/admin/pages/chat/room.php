<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';
require_once(__DIR__ . '/../../../../Models/ChatModel.php');
require_once(__DIR__ . '/../../../../Models/UsersModel.php');

$chatModel = new ChatModel();
$withId = $_GET['with'] ?? null;
$selfId = $_SESSION['user']['id'];

$roomId = min($withId, $selfId) . '_' . max($withId, $selfId); // đơn giản hóa phòng chat 1-1

$messages = $chatModel->getMessagesByRoomId([$roomId]);
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
        <div class="col-8 mx-4" id="chat-box">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    Đang trò chuyện với: <?= (new UsersModel())->detail($withId)['name'] ?>
                </div>
                <div class="card-body" style="overflow-y: auto; height: 60vh;" id="messages-container">
                    <?php foreach ($messages as $msg): ?>
                        <div class="mb-2 <?= $msg['sender_id'] == $selfId ? 'text-end' : 'text-start' ?>">
                            <small class="text-muted"><?= $msg['name'] ?>:</small><br>
                            <span class="badge bg-light text-dark" style="font-size: 15px;"><?= htmlspecialchars($msg['content']) ?></span>
                            <br>
                            <span class="text-muted" style="font-size: 11px;">
                                <?= date('H:i d/m', strtotime($msg['created_at'])) ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="card-footer">
                    <form id="chat-form" action="/send?with=<?= $roomId ?>" method="POST">
                        <input type="hidden" name="room_id" value="<?= $roomId ?>">
                        <input type="hidden" name="receiver_id" value="<?= $receiver['id'] ?>">
                        <div class="input-group">
                            <input type="text" name="content" class="form-control" placeholder="Nhập tin nhắn...">
                            <button class="btn btn-primary" type="submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    const chatForm = document.getElementById('chat-form');
    const messagesContainer = document.getElementById('messages-container');

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(chatForm);
        formData.append('room_id', '<?= $roomId ?>');
        formData.append('to_id', '<?= $withId ?>');

        fetch('/send_messages.php', {
                method: 'POST',
                body: formData
            }).then(res => res.text())
            .then(() => {
                // location.reload();
            });
    });
</script> -->
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>