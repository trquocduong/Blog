<body>
  <div
    class="form-control bg-light mb-2 overflow-hidden position-relative"
    style="height: 45px">
    <div
      class="position-absolute"
      style="white-space: nowrap; animation: marquee 20s linear infinite">
      <span class="text-muted">🔥 Nhập từ khóa như "du lịch hè", "sức khoẻ 2025", "thiết kế web
        đẹp"... để tìm kiếm nhanh!</span>
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
        data-bs-target="#navbarNav">
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
              <?php foreach ($category as $item) :
              ?>
                <div class="col me-1 badge text-bg-success text-wrap">
                  <?= $item['name'] ?>
                </div>
              <?php endforeach ?>
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
                placeholder="Tìm kiếm bài viết mới ..." />
            </div>
            <div class="mt-2" style="font-size: 13px">
              <p class="text-muted">
                🔍 Tìm kiếm nhiều nhất:
                <?php foreach (array_slice($category, 0, 3) as $item):
                ?>
                  <span class="badge" style="background-color: var(--main-color)"> <?= $item['name'] ?></span>
                <?php endforeach ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav align-items-center ms-auto">
          <li class="nav-item me-2 ">
            <button class="btn fw-bold" href="" style="background-color: var(--main-color)">
              <a href="/create_post" class="nav-link"><i class="fa-solid fa-plus"></i></a>
            </button>
          </li>
          <?php if (!empty($_SESSION['user'])) { ?>
            <?php if (isset($_SESSION['user']['id'])): ?>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle d-flex align-items-center"
                  href="/profile?id=<?= $_SESSION['user']['id'] ?>"
                  role="button">
                  <img src="<?= $_SESSION['user']['img'] ?>" class="rounded-circle me-2" width="40" height="40">
                  <span class="d-none d-md-inline"><?= $_SESSION['user']['name'] ?>
                    <br>
                    <small class="d-none d-md-inline">
                      <?php if ($_SESSION['user']['role'] == 1) { ?>
                        Khách
                      <?php } else { ?>
                      <?php } ?>
                      Admin
                    </small>
                </a>
              </li>
            <?php endif; ?>
          <?php } else { ?>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center"
                href="/login"
                role="button">
                <i class="fa-regular fa-circle-user fs-4 me-1"></i>
                <span class="d-none d-md-inline"> Đăng Nhập</span>
              </a>
            </li>
          <?php } ?>
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
        data-bs-target="#offcanvasMobileNav">
        <i class="fa-solid fa-bars fs-4"></i>
      </button>
    </div>
    <div
      class="offcanvas offcanvas-start"
      tabindex="-1"
      id="offcanvasMobileNav">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold">Menu</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <div class="mb-3">
          <input
            type="text"
            class="form-control"
            placeholder="Tìm sản phẩm..." />
        </div>
        <div class="mb-3 text-muted" style="font-size: 13px">
          🔍 Tìm kiếm nhiều nhất:
          <span class="badge bg-secondary">Thiết kế web trọn gói</span>
        </div>
        <div class="mb-3">
          <strong class="d-block mb-2">Danh mục</strong>
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            <div class="col badge text-bg-success text-wrap">
              This text should wrap.
            </div>
            <?php foreach ($category as $item) :
            ?>
              <a href="#" class="text-decoration-none text-dark"><?= $item['name'] ?></a>
            <?php endforeach ?>
          </div>
        </div>
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