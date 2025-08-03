<?php
class PermissionController extends Controller
{
    private $permission;

    public function __construct()
    {
        $this->permission = new PermissionModel();
    }

    public function index()
    {
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = $page < 1 ? 1 : $page;

        $offset = ($page - 1) * $limit;

        $filterHide = isset($_GET['hide']) ? (int)$_GET['hide'] : null;

        if ($filterHide === 0 || $filterHide === 1) {
            $permissions = $this->permission->getFilteredPaginatedPermissions($filterHide, $limit, $offset);
            $totalRecords = $this->permission->countFiltered($filterHide);
        } else {
            $permissions = $this->permission->getPaginatedPermissions($limit, $offset);
            $totalRecords = $this->permission->countPermissions();
        }

        $totalPages = ceil($totalRecords / $limit);
        // thống kê số lượng quyền
        $total = count($this->permission->getAllPermissions());
        $totalVisible = $this->permission->countByHide(0);
        $totalHidden = $this->permission->countByHide(1);

        $this->view('admin/pages/permissions/index', [
            'permissions' => $permissions,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'total' => $total,
            'totalVisible' => $totalVisible,
            'totalHidden' => $totalHidden
        ]);
    }

    public function manage()
    {
        $users = $this->permission->getAllUsers();
        $permissions = $this->permission->getAllPermissions();
        $selectedUserId = $_GET['user_id'] ?? null;
        $userPermissions = [];

        if ($selectedUserId) {
            $userPermissions = $this->permission->getUserPermissionIds($selectedUserId);
        }

        $this->view('admin/pages/permissions/manage', [
            'users' => $users,
            'permissions' => $permissions,
            'selectedUserId' => $selectedUserId,
            'userPermissions' => $userPermissions
        ]);
    }

    public function update()
    {
        session_start();
        $userId = $_POST['user_id'];
        $permissions = $_POST['permissions'] ?? [];
        $this->permission->updateUserPermissions($userId, $permissions);
        $_SESSION['toast'] = 'Phân quyền thành công!';
        header("Location: /permissions_index?user_id=$userId");
    }

    public function create()
    {
        $this->view('admin/pages/permissions/create', []);
    }

    public function store()
    {
        session_start();
        $this->permission->addPermission($_POST['name'], $_POST['key_code'], $_POST['hide']);
        $_SESSION['toast'] = 'Thêm quyền thành công!';
        header("Location: /permissions");
    }

    public function hide()
    {
        session_start();
        $this->permission->togglePermissionVisibility($_GET['id']);
        $_SESSION['toast'] = 'Đã ẩn quyền!';
        header("Location: /admin/permissions");
    }
}
