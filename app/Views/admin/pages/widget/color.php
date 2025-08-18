<?php
clearstatcache();
$title = "Quản trị giao diện";
$configPath = __DIR__ . '/../../../../../theme.json';  // Đảm bảo đường dẫn đúng
$config = json_decode(file_get_contents($configPath), true);
if (is_array($config) && isset($config['main_color']) && preg_match('/^#[a-fA-F0-9]{6}$/', $config['main_color'])) {
  $mainColor = $config['main_color'];
} else {
  $mainColor = '#007bff';
}
ob_start();
?>
<div class="tabs shadow-sm mb-3 p-3">
  <div class="row">
    <div class="col-6">
      <h5><i class="bi bi-tags-fill me-2"></i>Quản lý màu sắc</h5>
      <small>Last updated 3 mins ago</small>
    </div>
    <div class="col-6">
      <div class="text-end">
        <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
      </div>
    </div>
  </div>
</div>
<div class="card shadow-sm rounded-3">
  <div class="card-body">
    <form method="POST" action="/save-theme">
      <div class="mb-3">
        <label for="mainColor" class="form-label fw-bold">Màu chủ đạo</label>
        <div class="input-group">
          <input type="color" class="form-control form-control-color"
            id="mainColor"
            name="main_color"
            value="<?= htmlspecialchars($mainColor ?? '#0d6efd') ?>"
            title="Chọn màu chủ đạo">
          <span class="input-group-text"><i class="bi bi-palette"></i></span>
        </div>
        <small class="text-muted">Màu này sẽ áp dụng cho nút, navbar và các thành phần chính.</small>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="bi bi-save me-1"></i> Lưu thay đổi
      </button>
    </form>
  </div>
</div>

<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>