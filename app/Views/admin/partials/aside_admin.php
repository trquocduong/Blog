<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
} ?>
<nav class="sidebar p-4 bg-white border-end vh-100">
  <ul class="nav flex-column">
    <h6 class="text-uppercase text-primary fw-bold small mt-2">Menu</h6>

    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" href="admin">
        <i class="bi bi-bar-chart-fill me-2"></i> Thống kê
      </a>
    </li>
    <?php if (Middleware::checkPermissionSilent('manage_tags')): ?>
      <li class="nav-item">
        <a class="nav-link text-dark rounded py-2 px-3 hover-light" href="/tags">
          <i class="bi bi-tags-fill me-2"></i> Thẻ
        </a>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" data-bs-toggle="collapse" href="#menu-posts">
        <i class="bi bi-pencil-square me-2"></i> Bài viết
      </a>
      <div class="collapse ps-3" id="menu-posts">
        <a class="nav-link text-dark rounded py-2 hover-light" href="posts.php">Tất cả bài viết</a>
        <a class="nav-link text-dark rounded py-2 hover-light" href="add-post.php">Viết bài mới</a>
        <a class="nav-link text-dark rounded py-2 hover-light" href="categories.php">Chuyên mục</a>
      </div>
    </li>

    <?php if (Middleware::checkPermissionSilent('manage_pages')): ?>
      <li class="nav-item">
        <a class="nav-link text-dark rounded py-2 px-3 hover-light" data-bs-toggle="collapse" href="#menu-pages">
          <i class="bi bi-file-earmark-text-fill me-2"></i> Trang
        </a>
        <div class="collapse ps-3" id="menu-pages">
          <a class="nav-link text-dark rounded py-2 hover-light" href="/pages">Tất cả trang</a>
          <a class="nav-link text-dark rounded py-2 hover-light" href="/create-page">Trang mới</a>
        </div>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" href="media.php">
        <i class="bi bi-image-fill me-2"></i> Thư viện Media
      </a>
    </li>

    <h6 class="text-uppercase text-primary fw-bold small mt-4">Người dùng</h6>
    <?php if (Middleware::checkPermissionSilent('manage_per')): ?>
      <li class="nav-item">
        <a class="nav-link text-dark rounded py-2 px-3 hover-light" data-bs-toggle="collapse" href="#menu-q">
          <i class="bi bi-people-fill me-2"></i> Phân Quyền
        </a>
        <div class="collapse ps-3" id="menu-q">
          <a class="nav-link text-dark rounded py-2 hover-light" href="/permissions">Danh sách</a>
          <a class="nav-link text-dark rounded py-2 hover-light" href="/permissions_index">Quyền</a>
        </div>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" data-bs-toggle="collapse" href="#menu-users">
        <i class="bi bi-person-fill me-2"></i> Người dùng
      </a>
      <div class="collapse ps-3" id="menu-users">
        <a class="nav-link text-dark rounded py-2 hover-light" href="/users">Danh sách</a>
        <a class="nav-link text-dark rounded py-2 hover-light" href="/user_create">Thêm mới</a>
        <a class="nav-link text-dark rounded py-2 hover-light" href="profile.php">Hồ sơ của tôi</a>
      </div>
    </li>
    <h6 class="text-uppercase text-primary fw-bold small mt-4">Chat</h6>

    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" data-bs-toggle="collapse" href="#menu-widget">
        <i class="bi bi-palette-fill me-2"></i> Chat
      </a>
      <div class="collapse ps-3" id="menu-widget">
        <a class="nav-link text-dark rounded py-2 hover-light" href="/chat">Danh sách </a>
        <a class="nav-link text-dark rounded py-2 hover-light" href="/messages">Chat</a>
      </div>
    </li>

    <h6 class="text-uppercase text-primary fw-bold small mt-4">Giao diện</h6>

    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" data-bs-toggle="collapse" href="#menu-widget">
        <i class="bi bi-palette-fill me-2"></i> Giao diện
      </a>
      <div class="collapse ps-3" id="menu-widget">
        <a class="nav-link text-dark rounded py-2 hover-light" href="/color">Màu sắc</a>
        <a class="nav-link text-dark rounded py-2 hover-light" href="widget.php">Widget</a>
      </div>
    </li>

    <h6 class="text-uppercase text-primary fw-bold small mt-4">Hệ thống</h6>

    <li class="nav-item">
      <a class="nav-link text-dark rounded py-2 px-3 hover-light" href="settings.php">
        <i class="bi bi-gear-fill me-2"></i> Cài đặt
      </a>
    </li>
  </ul>
  <?php if (isset($_SESSION['user']['id'])): ?>
    <li class="nav-item">
      <span class="nav-link text-success fw-bold">
        👋 Xin chào, <?= htmlspecialchars($_SESSION['user']['id']) ?>
      </span>
    </li>
  <?php endif; ?>
</nav>