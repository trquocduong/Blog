<?php
$config = json_decode(file_get_contents(__DIR__ . '/../../../../theme.json'), true);
$mainColor = $config["main_color"] ?? '#007bff';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? 'Quốc Dương Blog' ?></title>
  <link rel="stylesheet" href="public/assets/css/style.css" />
  <style>
    :root {
      --main-color: <?= htmlspecialchars($mainColor) ?>;
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="container py-4">
  <?= $content ?? '' ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>

