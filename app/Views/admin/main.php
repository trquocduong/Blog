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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <title><?= $title ?? 'Admin' ?></title>


  <style>
    .header {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .icon-circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .user-info span {
      display: block;
      line-height: 1;
    }

    .hover-light:hover {
      background-color: #e9f5ff !important;
    }

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
      <div class="container py-4 bg-light">
        <?= $admin ?? '' ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll('.select-all').forEach(function(selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
          const group = this.getAttribute('data-target');
          const checkboxes = document.querySelectorAll('.group-' + group);
          checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
          });
        });
      });
    });
  </script>

</body>

</html>