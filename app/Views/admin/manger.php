<?php
$title = "Quản trị giao diện";
$configPath = __DIR__ . '/../../../theme.json';  // Đảm bảo đường dẫn đúng
$config = json_decode(file_get_contents($configPath), true);
if (is_array($config) && isset($config['main_color']) && preg_match('/^#[a-fA-F0-9]{6}$/', $config['main_color'])) {
    $mainColor = $config['main_color'];
} else {
    $mainColor = '#007bff';
}
ob_start();
?>
<h2>🎨 Quản trị giao diện</h2>
<form method="POST" action="/save-theme">
  <label>Màu chủ đạo:</label>
  <input type="color" name="main_color" value="<?= htmlspecialchars($mainColor) ?>" />
  <button type="submit">Lưu</button>
</form>
<?php
$admin = ob_get_clean();
include __DIR__ . '/main.php';  
?>
