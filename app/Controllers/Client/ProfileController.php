<?php

class ProfileController extends Controller
{
    private $category, $tags, $users;

    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->tags = new TagsModel();
        $this->users = new UsersModel();
    }

    public function profile()
    {
        $id = $_GET['id'];
        $category = $this->category->show();
        $tags = $this->tags->show();
        $users = $this->users->detail($id);
        $this->view('client/profile/profile', ['category' => $category, 'tags' => $tags, 'users' => $users]);
    }

    public function profile_post()
    {
        $this->view('client/profile/profile_post');
    }

    public function update()
    {
        $id = $_GET['id'];
        $users = $this->users->detail($id);
        $category = $this->category->show();
        $tags = $this->tags->show();
        $this->view('client/profile/profile_update', ['users' => $users, 'category' => $category, 'tags' => $tags]);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = $this->users->detail($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name  = $_POST['name'] ?? $user['name'];
            $email = $_POST['email'] ?? $user['email'];
            $phone = $_POST['phone'] ?? $user['phone'];
            $oldimg = $user['img'];
            $img = $oldimg;
            if (!empty($_FILES['img']['name']) && $_FILES['img']['error'] === 0) {
                $uploadDir = __DIR__ . '/../../../uploads/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $originalName = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
                $originalName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $originalName);
                $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $fileName = time() . '_' . $originalName . '.' . $extension;
                $targetFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
                    if (!empty($oldimg)) {
                        $oldPath = __DIR__ . '/../../../' . ltrim($oldimg, '/');
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    $img = '/uploads/' . $fileName;
                }
            }
            $this->users->updateprofile($id, $img, $name, $email, $phone);

            $_SESSION['toast'] = 'Cập nhật thông tin thành công.';
            header("Location: /profile?id=$id");
            exit;
        }
    }

    public function forgetpw()
    {
        $id = $_GET['id'];
        $category = $this->category->show();
        $tags = $this->tags->show();
        $users = $this->users->detail($id);
        $this->view('client/profile/forget_pw', ['category' => $category, 'tags' => $tags, 'users' => $users]);
    }

    public function forget_pw_profile()
    {
        $id = $_GET['id'];
        $user = $this->users->detail($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old_pw  = $_POST['old_pw'] ?? '';
            $password  = $_POST['password'] ?? '';
            $repassword = $_POST['repassword'] ?? '';
            if ($password !== $repassword) {
                $_SESSION['toast_error'] = 'Hai mật khẩu mới không giống nhau !.';
                header("Location: /forget_password?id=$id");
                return;
            }
            if (!password_verify($old_pw, $user['password'])) {
                $_SESSION['toast_error'] = 'Sai mật khẩu hiện tại.';
                header("Location: /forget_password?id=$id");
                return;
            }

            $this->users->repassword($id, $password);
            $_SESSION['toast'] = 'Cập nhật thông tin thành công.';
            header("Location: /forget_password?id=$id");
        } else {
            $_SESSION['toast'] = 'Đã xảy ra lỗi';
            header("Location: /forget_password?id=$id");
        }
    }
}
