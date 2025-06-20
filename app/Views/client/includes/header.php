<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quốc Dương Blog</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div
      class="form-control bg-light mb-2 overflow-hidden position-relative"
      style="height: 45px"
    >
      <div
        class="position-absolute"
        style="white-space: nowrap; animation: marquee 20s linear infinite"
      >
        <span class="text-muted"
          >🔥 Nhập từ khóa như "du lịch hè", "sức khoẻ 2025", "thiết kế web
          đẹp"... để tìm kiếm nhanh!</span
        >
      </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white sticky-top d-none d-lg-block">
      <div class="container">
        <a class="navbar-brand fw-bold fs-2" href="/" style="color: var(--main-color);">TOPMẸO <span class="text-dark">.vn</span></a>
 <!-- font-family: cursive; -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item position-relative danh-muc-hover">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <i class="fa-solid fa-bars" style="color: var(--main-color)"></i>
              <strong>DANH MỤC</strong>
            </a>
            <div class="mega-menu bg-white p-4 shadow rounded">
              <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-1">
                <div class="col me-1 badge text-bg-success text-wrap">
                  This text should wrap.
                </div>
                <div class="col me-1 badge text-bg-success text-wrap">
                  This text should wrap.
                </div>
                <div class="col me-1 badge text-bg-success text-wrap">
                  This text should wrap.
                </div>
                <div class="col me-1 badge text-bg-success text-wrap">
                  This text should wrap.
                </div>
                <div class="col me-1 badge text-bg-success text-wrap">
                  This text should wrap.
                </div>
              </div>
            </div>
          </li>
        </ul>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Nhận sản phẩm tìm kiếm ..."
                />
              </div>
              <div class="mt-2" style="font-size: 13px">
                <p class="text-muted">
                  🔍 Tìm kiếm nhiều nhất:
                  <span class="badge" style="background-color: var(--main-color)">Thiết kế web trọn gói</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav align-items-center ms-auto">
            <li class="nav-item me-2 ">
              <button class="btn fw-bold" href="#" style="background-color: var(--main-color)
">
                <i class="fa-solid fa-plus"></i>
              </button>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center"
                href="/login"
                role="button"

              >
                <i class="fa-regular fa-circle-user fs-4 me-1"></i>
                <span class="d-none d-md-inline"> Đăng Nhập</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- giao diện mobile -->
    <nav class="navbar bg-white sticky-top d-block d-lg-none border-bottom">
      <div class="container-fluid justify-content-between">
        <a class="navbar-brand fw-bold fs-4" href="#">Dblog.com</a>
        <button
          class="btn"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasMobileNav"
        >
          <i class="fa-solid fa-bars fs-4"></i>
        </button>
      </div>

      <div
        class="offcanvas offcanvas-start"
        tabindex="-1"
        id="offcanvasMobileNav"
      >
        <div class="offcanvas-header">
          <h5 class="offcanvas-title fw-bold">Menu</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
          ></button>
        </div>
        <div class="offcanvas-body">
          <!-- Tìm kiếm -->
          <div class="mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Tìm sản phẩm..."
            />
          </div>
          <div class="mb-3 text-muted" style="font-size: 13px">
            🔍 Tìm kiếm nhiều nhất:
            <span class="badge bg-secondary">Thiết kế web trọn gói</span>
          </div>

          <!-- Danh mục -->
          <div class="mb-3">
            <strong class="d-block mb-2">Danh mục</strong>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
              <div class="col badge text-bg-success text-wrap">
                This text should wrap.
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Cho thuê loa kéo</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Cửa Lưới Chống Muỗi</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Vách Ngăn Tổ Ong</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Trang Trí Sinh Nhật</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark">Điện tử</a>
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Chống cháy</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Cách nhiệt</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark">Mỹ Phẩm</a>
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Thiết Kế Nội Thất</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Xưởng balo - túi xách</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Điện thoại</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Máy tính, laptop</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark">Đặc Sản</a>
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Tp Hồ Chí Minh</a
                >
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark">Thể Thao</a>
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark">Nhà hàng</a>
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none text-dark"
                  >Sắt Mỹ Nghệ</a
                >
              </div>
            </div>
          </div>

          <!-- Tài khoản -->
          <div class="border-top pt-3">
            <a href="#" class="d-flex align-items-center gap-2 mb-2">
              <i class="fa-regular fa-circle-user fs-5"></i>
              <span>Tài khoản</span>
            </a>
            <div class="list-group list-group-flush">
              <a class="list-group-item" href="#">Thông tin cá nhân</a>
              <a class="list-group-item" href="#">Bài viết của tôi</a>
              <a class="list-group-item text-danger" href="#">Đăng xuất</a>
            </div>
          </div>
        </div>
      </div>
    </nav>