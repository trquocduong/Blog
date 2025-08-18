<?php
class Middleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role'] !== 0) {
            header("Location: /login-admin");
            exit;
        }
        self::updateLastActive();
    }
    // public static function checkPermission($key_code)
    // {
    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     $userId = $_SESSION['user']['id'] ?? null;
    //     if (!$userId) {
    //         die('Bạn chưa đăng nhập.');
    //     }

    //     $permissionModel = new PermissionModel();
    //     $hasPermission = $permissionModel->hasPermission($userId, $key_code);

    //     if (!$hasPermission) {
    //         die('Bạn không có quyền truy cập chức năng này');
    //     }
    // }
    public static function checkPermissionSilent($key_code)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            return false;
        }

        $permissionModel = new PermissionModel();


        return $permissionModel->hasPermission($userId, $key_code);
    }

    public static function updateLastActive()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user']['id'])) {
            $id = $_SESSION['user']['id'];

            // Kết nối DB
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=d4blog", "root", "");

            $stmt = $pdo->prepare("UPDATE users SET last_active = NOW() WHERE id = ?");
            $stmt->execute([$id]);
        }
    }
}
