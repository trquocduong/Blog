<?php
$config = json_decode(file_get_contents(__DIR__ . '/../../../../theme.json'), true);
$mainColor = $config["main_color"] ?? '#007bff';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <?php
  $settingsModel = new SettingsModel();
  $settings = $settingsModel->getAll();
  ?>
  <title><?= htmlspecialchars($settings['meta_title'] ?? '') ?></title>
  <meta name="description" content="<?= htmlspecialchars($settings['meta_description'] ?? '') ?>">
  <meta name="keywords" content="<?= htmlspecialchars($settings['meta_keywords'] ?? '') ?>">
  <link rel="icon" href="public/<?= $settings['favicon'] ?? '/default.ico' ?>" type="image/x-icon">

  <?php if (!empty($settings['google_analytics'])): ?>
    <?= $settings['google_analytics'] ?>
  <?php endif; ?>

  <?php if (!empty($settings['chatbot_script'])): ?>
    <?= $settings['chatbot_script'] ?>
  <?php endif; ?>
  <link rel="stylesheet" href="public/assets/css/style.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
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