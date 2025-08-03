<?php
class UsersController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new UsersModel();
    }
    public function index()
    {
        if (!Middleware::checkPermissionSilent('manage_users')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xem danh sách tài khoản!';
            header('Location: /admin');
            exit;
        } else {
            $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = $page < 1 ? 1 : $page;

            $offset = ($page - 1) * $limit;

            $filterHide = isset($_GET['hide']) ? (int)$_GET['hide'] : null;

            if ($filterHide === 0 || $filterHide === 1 || $filterHide === 2) {
                $user = $this->user->getFilteredPaginatedPermissions($filterHide, $limit, $offset);
                $totalRecords = $this->user->countFiltered($filterHide);
            } else {
                $user = $this->user->getPaginatedPermissions($limit, $offset);
                $totalRecords = $this->user->countPermissions();
            }

            $totalPages = ceil($totalRecords / $limit);


            $total = count($this->user->index());
            $totalVisible = count($this->user->filterByHide(0));
            $totalHidden = count($this->user->filterByHide(2));

            $this->view('admin/pages/user/index', [
                'users' => $user,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'total' => $total,
                'totalVisible' => $totalVisible,
                'totalHidden' => $totalHidden
            ]);
        }
    }
    public function detail() {}
    public function create()
    {
        if (!Middleware::checkPermissionSilent('create_user')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền thêm tài khoản!';
            header('Location: /admin');
            exit;
        } else {
            $this->view('admin/pages/user/create');
        }
    }
    public function store()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hide = $_POST['hide'] ?? '';
            $role = $_POST['role'] ?? '';
            if ($this->user->findByEmail($email)) {
                $_SESSION['toast_error'] = 'Email của bạn đã tồn tại ở tài khoản khác !';
                header("Location: /create_user");
            } else {
                $this->user->create($name, $email, $phone, $password, $hide, $role);
                $_SESSION['toast'] = 'Thêm tài khoản thành công.';
                header("Location: /users");
                exit;
            }
        }
    }
    public function edit()
    {
        if (!Middleware::checkPermissionSilent('update_user')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xem danh sách tài khoản!';
            header('Location: /admin');
            exit;
        } else {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user = $this->user->detail($id);
                if ($user) {
                    $this->view('admin/pages/user/update', ['user' => $user]);
                } else {
                    $_SESSION['toast_error'] = 'Không tìm thấy tài khoản cần sửa';
                    header("Location: /users");
                }
            } else {
                $_SESSION['toast_error'] = 'Không tìm thấy tài khoản ';
                header("Location: /users");
            }
        }
    }
    public function update()
    {
        session_start();
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hide = $_POST['hide'];
            $role = $_POST['role'];
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
            $this->user->update($id, $name, $email, $phone, $password, $hide, $role);
            $_SESSION['toast'] = 'Thay đổi tài khoản thành công.';
            header("Location: /users");
            exit;
        }
    }
    public function delete()
    {
        if (!Middleware::checkPermissionSilent('delete_user')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xem danh sách tài khoản!';
            header('Location: /admin');
            exit;
        } else {
            $id = $_GET['id'];
            if (isset($id)) {
                $this->user->delete($id);
                $_SESSION['toast'] = 'Xoá tài khoản thành công.';
                header("Location: /users");
            } else {
                $_SESSION['toast'] = 'Không tin thấy sản phẩm cần xoá.';
                header("Location: /users");
            }
        }
    }
    public function search()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && !empty($_POST['search'])) {
            $keyword = trim($_POST['search']);
            $user = $this->user->search($keyword);
            $_SESSION['search_result'] = $user;
            header('Location: /search_user');
            exit;
        }
        if (isset($_SESSION['search_result'])) {
            $user = $_SESSION['search_result'];
            $filter = 'search';
            if (isset($_GET['sort']) && $_GET['sort'] === 'newest') {
                usort($user, function ($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                $filter = 'newest';
            } elseif (isset($_GET['sort']) && $_GET['sort'] === 'oldest') {
                usort($user, function ($a, $b) {
                    return strtotime($a['created_at']) - strtotime($b['created_at']);
                });
                $filter = 'oldest';
            }

            $this->view('admin/pages/user/search', ['user' => $user, 'filter' => $filter]);
            return;
        }
    }
}
