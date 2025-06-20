<?php
$totalPosts = 120;
$totalPages = 12;
$totalComments = 320;
$totalUsers = 20;
$monthlyPosts = [10, 12, 8, 15, 14, 20, 22, 18, 16, 10, 6, 12];
$months = ["Th1", "Th2", "Th3", "Th4", "Th5", "Th6", "Th7", "Th8", "Th9", "Th10", "Th11", "Th12"];
ob_start();
?>

<main class="col-md-9 col-lg-10">
      <h2 class="">📊 Thống kê tổng quan</h2>
      <div class="row g-4 mb-5">
        <div class="col-md-3">
          <div class="card text-bg-primary shadow-sm">
            <div class="card-body text-center">
              <h6 class="card-title">📝 Bài viết</h6>
              <h2><?= $totalPosts ?></h2>
              <a href="posts.php" class="btn btn-sm btn-light mt-2">Xem</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-bg-success shadow-sm">
            <div class="card-body text-center">
              <h6 class="card-title">📄 Trang</h6>
              <h2><?= $totalPages ?></h2>
              <a href="pages.php" class="btn btn-sm btn-light mt-2">Xem</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-bg-info shadow-sm">
            <div class="card-body text-center">
              <h6 class="card-title">💬 Bình luận</h6>
              <h2><?= $totalComments ?></h2>
              <a href="comments.php" class="btn btn-sm btn-light mt-2">Xem</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-bg-dark shadow-sm">
            <div class="card-body text-center">
              <h6 class="card-title">👥 Người dùng</h6>
              <h2><?= $totalUsers ?></h2>
              <a href="users.php" class="btn btn-sm btn-light mt-2">Xem</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8"><h4 class="mb-3">📈 Biểu đồ bài viết theo tháng</h4>
            <canvas id="postsChart" height="150"></canvas>
            </div>
        <div class="col-4">
            <h4 class="mb-3">🧾 Hoạt động gần đây</h4>
      <div class="alert alert-secondary">
        ✅ Đăng nhập lúc <strong><?= date('H:i d/m/Y') ?></strong>
      </div>
      <div class="alert alert-warning">
        📌 Có 5 bình luận đang chờ phê duyệt.
      </div>
        </div>
      </div>
      

      <hr class="my-5" />
      
    </main>
    <script>
const ctx = document.getElementById('postsChart').getContext('2d');
const postsChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($months) ?>,
    datasets: [{
      label: 'Số bài viết',
      data: <?= json_encode($monthlyPosts) ?>,
      backgroundColor: 'rgba(54, 162, 235, 0.6)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1,
      borderRadius: 6
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        ticks: { stepSize: 5 }
      }
    },
    plugins: {
      legend: { display: true }
    }
  }
});
</script>

<?php 
$admin=ob_get_clean();
include __DIR__ . '/../../main.php'; 
?>
