<?php
class AuthController extends Controller
{
    public function register()
    {
        $this->view('client/auth/register');
    }
    public function post_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $role = $_POST['role'] ?? '';
            $password = $_POST['password'] ?? '';
            $repassword = $_POST['repassword'] ?? '';
            if ($password !== $repassword) {
                $error = "Mật khẩu không khớp!";
                include __DIR__ . "/../../Views/client/auth/register.php";
                return;
            }
            $userModel = new UsersModel();

            if ($userModel->findByEmail($email)) {
                $error = "❌ Email đã tồn tại!";
            } else {
                $userModel->register($email, $phone, $role, $password);
                header("Location: /login");
                exit;
            }

            include __DIR__ . "/../../Views/client/auth/register.php";
        }
    }

    public function login()
    {
        $this->view('client/auth/login');
    }

    public function post_login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new UsersModel();
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: /");
            } else {
                $error = "Sai email hoặc mật khẩu";
                include __DIR__ . "/../../Views/client/auth/login.php";
            }
        } else {
            include __DIR__ . "/../../Views/client/auth/login.php";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user']['id'])) {
            $userModel = new UsersModel();
            $userModel->updateLastActive($_SESSION['user']['id'], date('Y-m-d H:i:s', strtotime('-5 minutes')));
        }
        session_destroy();
        header("Location: /");
    }
}
