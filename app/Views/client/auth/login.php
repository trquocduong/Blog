<?php 
$config = json_decode(file_get_contents(__DIR__ . '/../../../../theme.json'), true);
$mainColor = $config["main_color"] ?? '#007bff';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xin chào đã đến với Mẹo.vn </title>
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
    <style>
        .login{
        background-image: url('/public/assets/image/bg_login.webp'); 
        background-size: cover;      
        background-position: center;
        background-repeat: no-repeat;
        width: 100%; 
        height: 100vh; 
        }
        :root {
        --main-color: <?= htmlspecialchars($mainColor) ?>;
        }
    </style>
</head>
<body>
    <div class="login" >
          <div class="col-lg-7 d-flex align-items-center p-3">
              <div class="card-body p-4 p-lg-5 text-black">
                <form>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <a class="navbar-brand fw-bold fs-2" href="/" style="color: var(--main-color);">TOPMẸO <span class="text-dark">.vn</span></a>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"><strong>Đăng nhập</strong></h5>
                  <div data-mdb-input-init class="form-outline mb-4">
                     <label class="form-label" for="form2Example17">Email hoặc Tên</label>
                    <input type="email" id="form2Example17" class="form-control form-control-lg" style="font-size: 1rem;" placeholder="Nhập email của bạn"/>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Mật Khẩu</label>
                    <input type="password" id="form2Example27" class="form-control form-control-lg" style="font-size: 1rem;" placeholder="Nhập mật khẩu của bạn"/>
                  </div>

                  <div class="pt-1 mb-4 ">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block " type="button" style="
                   background-color: var(--main-color);">Đăng nhập</button>
                  </div>

                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                      <i class="fab fa-facebook-f"></i>
                    </button>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1" style="background-color: #dd4b39;">
                      <i class="fab fa-twitter"></i>
                    </button>
                <br>
                  <a class="small text-muted" href="#!">Bạn đã quên mật khẩu ?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản ? <a href="/register"
                      style="color: #393f81;">Đăng ký ngay !</a></p>
                  <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>
              </div>
            </div>
    </div>
</body>
</html>