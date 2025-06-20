<?php
$config = json_decode(file_get_contents(__DIR__ . '/../../../theme.json'), true);
$mainColor = $config["main_color"] ?? '#007bff';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="public/assets/css/admin.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title><?= $title ?? 'Admin' ?></title>
  
  <style>
    :root {
      --main-color: <?= htmlspecialchars($mainColor) ?>;
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/partials/header_admin.php'; ?>
  <div class="admin-wrapper">
<?php include __DIR__ . '/partials/aside_admin.php'; ?>
      <div class="main-content">
        <div class="container py-4">
          <?= $admin ?? '' ?>
        </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

