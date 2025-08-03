<?php
ob_start();
// session_start();
include __DIR__ . '/../../partials/toast.php'; ?>
<h4>Phòng chat</h4>

<div class="mb-2">
    <strong><?= $msg['name'] ?>:</strong>
    <?php if ($msg['type'] === 'file'): ?>
        <a href="<?= $msg['message'] ?>" target="_blank">📎 Tệp đính kèm</a>
    <?php else: ?>
        <?= htmlspecialchars($msg['message']) ?>
    <?php endif; ?>
    <small class="text-muted float-end"><?= date('H:i d/m/Y', strtotime($msg['created_at'])) ?></small>
</div>


<form id="chat-form" enctype="multipart/form-data">
    <input type="hidden" name="room_id" value="<?= $_GET['room_id'] ?>">
    <textarea name="message" class="form-control mb-2" placeholder="Nhập tin nhắn..."></textarea>
    <input type="file" name="file" class="form-control mb-2">
    <button class="btn btn-success">Gửi</button>
</form>
<script>
    document.querySelector('#chat-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const hasFile = formData.get('file').name;
        formData.append('type', hasFile ? 'file' : 'text');

        const res = await fetch('/?controller=chat&action=send', {
            method: 'POST',
            body: formData
        });
        const data = await res.json();
        if (data.status === 'success') {
            location.reload(); // hoặc cập nhật qua AJAX
        }
    });
</script>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>