<?php
class CategoriesController extends Controller
{
    private $category;
    public function __construct()
    {

        $this->category = new CategoryModel();
    }
    public function index()
    {
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = $page < 1 ? 1 : $page;

        $offset = ($page - 1) * $limit;
        $filterHide = isset($_GET['hide']) ? (int)$_GET['hide'] : null;
        if ($filterHide === 0 || $filterHide === 1 || $filterHide === 2) {
            $category = $this->category->getFilteredPaginatedPermissions($filterHide, $limit, $offset);
            $totalRecords = $this->category->countFiltered($filterHide);
        } else {
            $category = $this->category->getPaginatedPermissions($limit, $offset);
            $totalRecords = $this->category->countPermissions();
        }
        $totalPages = ceil($totalRecords / $limit);
        $total = count($this->category->show());
        $totalVisible = count($this->category->filterByHide(0));
        $totalHidden = count($this->category->filterByHide(1));

        $this->view('admin/pages/category/index', [
            'category' => $category,
            'total' => $total,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalVisible' => $totalVisible,
            'totalHidden' => $totalHidden
        ]);
    }


    public function detail() {}

    public function create()
    {
        $this->view('admin/pages/category/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $note = $_POST['note'] ?? '';
            $hide = $_POST['hide'] ?? 0;

            $this->category->create($name, $note, $hide);
            $_SESSION['toast'] = 'Thêm thẻ thành công!';
            header('Location: /category');
            exit;
        } else {
            $_SESSION['toast_error'] = "Có xảy ra lỗi.";
            header('Location: /category');
        }
    }
    public function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = $this->category->detail($id);
            if ($category) {
                $this->view('admin/pages/category/edit', ['category' => $category]);
            } else {
                echo ' Không tìm thấy thẻ cần sửa';
            }
        } else {
            echo 'Thẻ không tồn tại ';
        }
    }
    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            $name = $_POST['name'] ?? '';
            $note = $_POST['note'] ?? '';
            $hide = $_POST['hide'] ?? 0;

            if ($this->category->update($id, $name, $hide, $note)) {
                $_SESSION['toast'] = 'Sửa danh mục thành công!';
            } else {
                $_SESSION['toast_error'] = "Cập nhật thất bại!";
            }

            header('Location: /category');
            exit;
        } else {
            $_SESSION['toast_error'] = "Có xảy ra lỗi.";
            header('Location: /category');
            exit;
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        // $this->category->delete($id);
        // $_SESSION['toast'] = 'Xoá danh mục thành công!';
        try {
            $category = $this->category->detail($id);

            if (!$category) {
                $_SESSION['toast_error'] = 'Không tìm thấy danh mục!';
            } elseif ($this->category->iscategory($id)) {
                $_SESSION['toast_error'] = 'Không thể xoá. Danh mục đang được dùng trong bài viết!';
            } else {
                $this->category->delete($id);
                $_SESSION['toast'] = 'Xoá danh mục thành công!';
            }
        } catch (Exception $e) {
            $_SESSION['toast_error'] = 'Lỗi: ' . $e->getMessage();
        }

        header('Location: /category');
        exit;
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
            $keyword = trim($_POST['search']);
            $category = $this->category->search($keyword); // tìm kiếm DB
            $_SESSION['search_result'] = $category; // lưu kết quả vào session
            header('Location: /search'); // redirect để tránh resubmit
            exit;
        }

        // Nếu đã có kết quả tìm kiếm
        if (isset($_SESSION['search_result'])) {
            $category = $_SESSION['search_result'];
            $filter = 'search';

            // Sắp xếp nếu có ?sort=newest hoặc ?sort=oldest
            if (isset($_GET['sort']) && $_GET['sort'] === 'newest') {
                usort($category, function ($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                $filter = 'search-newest';
            } elseif (isset($_GET['sort']) && $_GET['sort'] === 'oldest') {
                usort($category, function ($a, $b) {
                    return strtotime($a['created_at']) - strtotime($b['created_at']);
                });
                $filter = 'search-oldest';
            }

            $this->view('admin/pages/category/search', ['category' => $category, 'filter' => $filter]);
            return;
        }

        // Nếu không tìm kiếm gì, chuyển về trang chính
        header('Location: /category'); // hoặc route gốc
    }
}
