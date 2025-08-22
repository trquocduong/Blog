<?php

class PostController extends Controller
{
    private $post, $category, $tags, $users;

    public function __construct()
    {
        $this->post = new PostModel();
        $this->category = new CategoryModel();
        $this->tags = new TagsModel();
        $this->users = new UsersModel();
    }

    public function detail()
    {
        $this->view('client/post/post_detail');
    }
    public function create()
    {
        $category = $this->category->show();
        $tags = $this->tags->show();
        $users = $this->users->index();
        $this->view('client/post/create_post', ['category' => $category, 'tags' => $tags, 'users' => $users]);
    }


    // Lưu bài viết
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /post/create");
            exit;
        }
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $seo_title = $_POST['seo_title'];
        $seo_description = $_POST['seo_description'];
        $seo_keywords = $_POST['seo_keywords'];
        $category_id = $_POST['category_id'];
        $tags = $_POST['tags'] ?? [];
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $filename = time() . '_' . basename($_FILES['thumbnail']['name']);
            $targetPath = rtrim($uploadDir, '/') . '/' . $filename;

            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetPath)) {
                $thumbnailPath = '/uploads/' . $filename;
            } else {
                die("Không thể lưu file vào thư mục uploads");
            }
        } else {
            die("Không có file upload hoặc lỗi: " . ($_FILES['thumbnail']['error'] ?? 'Không xác định'));
        }

        $user_id = $_SESSION['user']['id'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $post_id = $this->post->create([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            'seo_keywords' => $seo_keywords,
            'slug' => $slug,
            'thumbnail' => $thumbnailPath,
            'category_id' => $category_id,
            'status' => 0
        ]);
        if (!empty($tags)) {
            $this->post->attachTags($post_id, $tags);
        }

        header("Location: /profile_post?id=$user_id");
        exit;
    }
}
