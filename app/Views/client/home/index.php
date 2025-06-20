<?php
$title = "Trang chủ";

ob_start(); 
?>

<div class="container py-4">
      <h3 class="mb-4 animate__animated animate__fadeInDown fs-4"><strong>Đáng chú ý </strong>
      </h3>
      <div class="row">
        <div
          class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-1s"
        >
          <div class="card category-card">
            <img
              src="https://via.placeholder.com/400x200"
              class="card-img-top"
              alt="Danh mục"
            />
            <div class="card-body">
              <h5 class="card-title">Top 3 Công Nghệ</h5>
            </div>
          </div>
        </div>
        <div
          class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-2s"
        >
          <div class="mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="..." />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>

                  <p class="card-text">
                    <small class="text-body-secondary"
                      >Last updated 3 mins ago</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="..." />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    <small class="text-body-secondary"
                      >Last updated 3 mins ago</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="..." />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    <small class="text-body-secondary"
                      >Last updated 3 mins ago</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <hr />
        </div>

        <div
          class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-3s"
        >
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="..." />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>

                  <p class="card-text">
                    <small class="text-body-secondary"
                      >Last updated 3 mins ago</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="..." />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    <small class="text-body-secondary"
                      >Last updated 3 mins ago</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="..." />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    <small class="text-body-secondary"
                      >Last updated 3 mins ago</small
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <hr />
        </div>
      </div>
    </div>

    <!-- Suggested Posts -->
    <div class="container py-4">
      <h3 class="mb-4 animate__animated animate__fadeInLeft">
        Bài viết đề xuất
      </h3>
      <div class="row">
        <div
          class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-1s"
        >
          <div class="card post-card">
            <img
              src="https://via.placeholder.com/400x180"
              class="card-img-top"
              alt="Bài viết"
            />
            <div class="card-body">
              <h5 class="card-title">Review sản phẩm công nghệ mới nhất</h5>
              <p class="text-muted">👁 1,234 lượt xem</p>
              <a href="#" class="btn btn-outline-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>
        <div
          class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-2s"
        >
          <div class="card post-card">
            <img
              src="https://via.placeholder.com/400x180"
              class="card-img-top"
              alt="Bài viết"
            />
            <div class="card-body">
              <h5 class="card-title">Top 3 địa điểm du lịch mùa hè</h5>
              <p class="text-muted">👁 999 lượt xem</p>
              <a href="#" class="btn btn-outline-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>
        <div
          class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-3s"
        >
          <div class="card post-card">
            <img
              src="https://via.placeholder.com/400x180"
              class="card-img-top"
              alt="Bài viết"
            />
            <div class="card-body">
              <h5 class="card-title">Lối sống khoẻ mạnh năm 2025</h5>
              <p class="text-muted">👁 850 lượt xem</p>
              <a href="#" class="btn btn-outline-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php
$content = ob_get_clean(); 

include __DIR__ . '/../main/main.php'; 
?>
