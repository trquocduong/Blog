<?php
$config = json_decode(file_get_contents(__DIR__ . '/../../../../theme.json'), true);
$mainColor = $config["main_color"] ?? '#007bff';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập hệ thống quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    :root {
        --main-color: <?= htmlspecialchars($mainColor) ?>;
    }
</style>

<body class="bg-light bg-gradient d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card shadow border-0 p-4" style="width: 100%; max-width: 450px;">
        <div class="text-center mb-4">
            <a class="navbar-brand fw-bold fs-2" href="/" style="color: var(--main-color);">TOPMẸO <span class="text-dark">.vn</span></a>
            <h3 class=" fw-bold mb-1">DuongTech Admin</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Hệ thống quản lý nội dung trang blog TopMẹo.vn</p>
        </div>
        <form method="post" action="admin-login">
            <p style="color:red"><?= $error ?? '' ?></p>
            <div class="mb-3">
                <label for="email" class="form-label">Email đăng nhập</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="admin@techcorp.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-lg text-light" style="background-color: var(--main-color)">Đăng nhập</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <small class="text-muted">© 2025 <strong>DW</strong>. All rights reserved.</small>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>