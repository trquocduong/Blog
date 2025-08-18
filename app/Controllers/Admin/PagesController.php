<?php
class PagesController extends Controller
{
    private $pages;
    public function __construct()
    {
        $this->pages = new PageModel();
    }
    public function index()
    {
        if (!Middleware::checkPermissionSilent('manage_pages')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xem danh sách trang.';
            header('Location: /admin');
            exit;
        } else {
            $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = $page < 1 ? 1 : $page;

            $offset = ($page - 1) * $limit;
            $filterHide = isset($_GET['hide']) ? (int)$_GET['hide'] : null;
            if ($filterHide === 0 || $filterHide === 1 || $filterHide === 2) {
                $pages = $this->pages->getFilteredPaginatedPermissions($filterHide, $limit, $offset);
                $totalRecords = $this->pages->countFiltered($filterHide);
            } else {
                $pages = $this->pages->getPaginatedPermissions($limit, $offset);
                $totalRecords = $this->pages->countPermissions();
            }
            $totalPages = ceil($totalRecords / $limit);
            $total = count($this->pages->show());
            $totalVisible = count($this->pages->filterByHide(0));
            $totalHidden = count($this->pages->filterByHide(1));
            $this->view('admin/pages/page/index', [
                'pages' => $pages,
                'total' => $total,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'totalVisible' => $totalVisible,
                'totalHidden' => $totalHidden
            ]);
        }
    }
    public function create()
    {
        if (!Middleware::checkPermissionSilent('create_page')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền thêm trang mới. Vui lòng liên hệ admin!';
            header('Location: /pages');
            exit;
        } else {
            $pages = $this->pages->show();
            $this->view('admin/pages/page/create', [
                'pages' => $pages
            ]);
        }
    }
    public function store()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'] ?? '';
            $slug = $_POST['slug'] ?? '';
            $content = $_POST['content'] ?? '';
            $hide = $_POST['hide'] ?? 0;
            $seo_title = $_POST['seo_title'] ?? '';
            $seo_description = $_POST['seo_description'] ?? '';

            $this->pages->create($title, $slug, $content, $hide, $seo_title, $seo_description);
            $_SESSION['toast'] = 'Cập nhật trang thành công!';
            header('Location: /pages');
            exit;
        } else {
            $_SESSION['toast_error'] = "Không thể thêm trang";
            $this->view('admin/pages/page/create');
        }
    }
    public function detail()
    {
        $slug = $_GET['slug'];
        $pages = $this->pages->find($slug);
        $this->view('admin/pages/page/detail', ['pages' => $pages]);
    }
    public function edit()
    {
        if (!Middleware::checkPermissionSilent('edit_page')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền sửa trang này. Vui lòng liên hệ admin!';
            header('Location: /pages');
            exit;
        } else {
            $id = $_GET['id'] ?? null;
            if (!$id) return;

            $page = $this->pages->find($id);
            $this->view('admin/pages/page/update', ['page' => $page]);
        }
    }

    public function update()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $title = $_POST['title'] ?? '';
            $slug = $_POST['slug'] ?? '';
            $content = $_POST['content'] ?? '';
            $hide = $_POST['hide'] ?? 0;
            $seo_title = $_POST['seo_title'] ?? '';
            $seo_description = $_POST['seo_description'] ?? '';

            $this->pages->update($id, $title, $slug, $content, $hide, $seo_title, $seo_description);
            $_SESSION['toast'] = 'Cập nhật trang thành công!';
            header('Location: /pages');
            exit;
        }
    }

    public function delete()
    {
        if (!Middleware::checkPermissionSilent('delete_page')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xoá trang này!';
            header('Location: /pages');
            exit;
        } else {
            session_start();
            $id = $_GET['id'] ?? '';
            $page = $this->pages->find($id);
            if ($page && $page['hide'] == 1) {
                $this->pages->delete($id);
                $_SESSION['toast'] = 'Xoá trang thành công!';
                header('Location: /pages');
            } else {
                $_SESSION['toast_error'] = "Không thể xoá do trang đang hoạt động !";
                header('Location: /pages');
            }
        }
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
            $keyword = trim($_POST['search']);
            $pages = $this->pages->search($keyword); // tìm kiếm DB
            $_SESSION['search_result'] = $pages; // lưu kết quả vào session
            header('Location: /pages-search'); // redirect để tránh resubmit
            exit;
        }
        if (isset($_SESSION['search_result'])) {
            $pages = $_SESSION['search_result'];
            $filter = 'search';
            if (isset($_GET['sort']) && $_GET['sort'] === 'newest') {
                usort($pages, function ($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                $filter = 'search-newest';
            } elseif (isset($_GET['sort']) && $_GET['sort'] === 'oldest') {
                usort($pages, function ($a, $b) {
                    return strtotime($a['created_at']) - strtotime($b['created_at']);
                });
                $filter = 'search-oldest';
            }

            $this->view('admin/pages/page/search', ['pages' => $pages, 'filter' => $filter]);
            return;
        }
        header('Location: /pages');
    }
}
