<?php
class TagsController extends Controller
{
    private $tags;

    public function __construct()
    {
        $this->tags = new TagsModel();
    }
    public function index()
    {
        if (!Middleware::checkPermissionSilent('manage_tags')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xem danh sách thẻ!';
            header('Location: /admin');
            exit;
        } else {
            $hide = isset($_GET['hide']) ? $_GET['hide'] : null;

            if ($hide === '' || $hide === null) {
                $tags = $this->tags->show();
            } else {
                $tags = $this->tags->filterByHide($hide);
            }

            $total = count($this->tags->show());
            $totalVisible = count($this->tags->filterByHide(0));
            $totalHidden = count($this->tags->filterByHide(1));

            $this->view('admin/pages/tags/index', [
                'tags' => $tags,
                'total' => $total,
                'totalVisible' => $totalVisible,
                'totalHidden' => $totalHidden
            ]);
        }
    }

    public function detail()
    {

        $slug = $_GET['slug'];
        $tags = $this->tags->detail($slug);
        $total = count($this->tags->show());
        $totalVisible = count($this->tags->filterByHide(0));
        $totalHidden = count($this->tags->filterByHide(1));
        $this->view('admin/pages/tags/detail', [
            'tags' => $tags,
            'total' => $total,
            'totalVisible' => $totalVisible,
            'totalHidden' => $totalHidden
        ]);
    }
    public function get_create()
    {
        if (!Middleware::checkPermissionSilent('create_tags')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền thêm thẻ xin vui lòng liên hệ admin!';
            header('Location: /tags');
            exit;
        } else {
            $tags = $this->tags->show();
            $this->view('admin/pages/tags/create', ['tags' => $tags]);
        }
    }
    public function create()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hide = $_POST['hide'] ?? 0;
            $name = $_POST['name'] ?? '';
            $slug = $_POST['slug'] ?? '';

            $this->tags->create($name, $slug, $hide);
            $_SESSION['toast'] = 'Thêm thẻ thành công!';
            // $_SESSION['toast_error'] = "Không thể thêm, slug đã tồn tại.";
            header('Location: /tags');
            exit;
        } else {
            $this->view('admin/create');
        }
    }
    public function get_update()
    {
        if (!Middleware::checkPermissionSilent('update_tags')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền sửa thẻ. Vui lòng liên hệ admin!';
            header('Location: /tags');
            exit;
        } else {
            if (isset($_GET['slug'])) {
                $slug = $_GET['slug'];
                $tags = $this->tags->detail($slug);
                if ($tags) {

                    $this->view('admin/pages/tags/update', ['tags' => $tags]);
                } else {
                    echo ' Không tìm thấy thẻ cần sửa';
                }
            } else {
                echo 'Thẻ không tồn tại ';
            }
        }
    }
    public function update()
    {
        session_start();
        $oldSlug = $_GET['slug'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $newSlug = $_POST['slug'];
            $hide = $_POST['hide'];

            $this->tags->update($name, $newSlug, $hide, $oldSlug);
            $_SESSION['toast'] = 'Sửa thẻ thành công !';
            header('Location: /tags');
        } else {
            $tag = $this->tags->detail($oldSlug);
            $this->view('admin/pages/tags/edit', ['tag' => $tag]);
        }
    }


    public function delete()
    {
        if (!Middleware::checkPermissionSilent('delete_tags')) {
            $_SESSION['toast_error'] = 'Bạn không có quyền xoá thẻ!';
            header('Location: /tags');
            exit;
        } else {
            $slug = $_GET['slug'];
            try {
                $tag_id = $this->tags->getIdBySlug($slug);

                if (!$tag_id) {
                    $_SESSION['toast_error'] = 'Không tìm thấy thẻ!';
                } elseif ($this->tags->isTagUsed($tag_id)) {
                    $_SESSION['toast_error'] = 'Không thể xoá. Thẻ đang được dùng trong bài viết!';
                } else {
                    $this->tags->delete($slug);
                    $_SESSION['toast'] = 'Xoá thẻ thành công!';
                }
            } catch (Exception $e) {
                $_SESSION['toast_error'] = 'Lỗi:' . $e->getMessage();
            }
        }
        header('Location: /tags');
        exit;
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
            $keyword = trim($_POST['search']);
            $tags = $this->tags->search($keyword); // tìm kiếm DB
            $_SESSION['search_result'] = $tags; // lưu kết quả vào session
            header('Location: /search'); // redirect để tránh resubmit
            exit;
        }

        // Nếu đã có kết quả tìm kiếm
        if (isset($_SESSION['search_result'])) {
            $tags = $_SESSION['search_result'];
            $filter = 'search';

            // Sắp xếp nếu có ?sort=newest hoặc ?sort=oldest
            if (isset($_GET['sort']) && $_GET['sort'] === 'newest') {
                usort($tags, function ($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                $filter = 'search-newest';
            } elseif (isset($_GET['sort']) && $_GET['sort'] === 'oldest') {
                usort($tags, function ($a, $b) {
                    return strtotime($a['created_at']) - strtotime($b['created_at']);
                });
                $filter = 'search-oldest';
            }

            $this->view('admin/pages/tags/search', ['tags' => $tags, 'filter' => $filter]);
            return;
        }

        // Nếu không tìm kiếm gì, chuyển về trang chính
        header('Location: /tags'); // hoặc route gốc
    }
}
