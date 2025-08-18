<?php
require_once __DIR__ . "/../../../core/Middleware.php";
class AdminController extends Controller
{
    // public function __construct()
    // {
    //     session_start();
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== '0') {
    //         header("Location: /login-admin");
    //         exit;
    //     }
    // }
    public function admin()
    {
        Middleware::handle();
        $this->view('admin/pages/home/index');
    }
    public function save_theme()
    {
        // Thực hiện lưu file JSON
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newColor = $_POST["main_color"];
            $configPath = __DIR__ . '/../../../theme.json';
            $config = json_decode(file_get_contents($configPath), true);
            $config['main_color'] = $newColor;
            file_put_contents($configPath, json_encode($config, JSON_PRETTY_PRINT));
            header("Location: /admin");
            exit;
        }
    }
    public function color()
    {
        $this->view('admin/pages/widget/color');
    }
    public function media()
    {
        $this->view('admin/pages/media/media');
    }

    public function login_admin()
    {
        $this->view("admin/auth/login_admin");
    }
    public function loginSubmit()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $userModel = new usersModel();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            if ($user['role'] === 0) {
                $_SESSION['user'] = $user;
                header("Location: /admin");
                exit;
            } else {
                $error = "Bạn không có quyền truy cập trang quản trị.";
            }
        } else {
            $error = "Thông tin đăng nhập không hợp lệ.";
        }
        include __DIR__ . "/../../Views/admin/auth/login_admin.php";
    }
}
