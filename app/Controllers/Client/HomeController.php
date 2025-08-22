<?php
class HomeController extends Controller
{
    private $category, $tags, $users, $post;
    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->tags = new TagsModel();
        $this->users = new UsersModel();
        $this->post = new postModel();
    }
    public function index()
    {
        $category = $this->category->show();
        $tags = $this->tags->show();
        $users = $this->users->index();
        $this->view('client/home/index', ['category' => $category, 'tags' => $tags, 'users' => $users]);
    }

    // public function store()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         header("Location: /post/create");
    //         exit;
    //     }
    //     $title = $_POST['title'];
    //     $description = $_POST['description'];
    //     $content = $_POST['content'];
    //     $seo_title = $_POST['seo_title'];
    //     $seo_description = $_POST['seo_description'];
    //     $seo_keywords = $_POST['seo_keywords'];
    //     $category_id = $_POST['category_id'];
    //     $tags = $_POST['tags'] ?? [];
    //     $status = $_POST['status'];
    //     $thumbnailPath = null;

    //     if (!empty($_FILES['thumbnail']['name'])) {
    //         $filename = time() . '_' . basename($_FILES['thumbnail']['name']);
    //         $targetPath = "uploads/media/" . $filename;
    //         move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetPath);
    //         $thumbnailPath = $targetPath;
    //     }
    //     $user_id = $_SESSION['user']['id'];
    //     $slug = $this->post->generateUniqueSlug($title);
    //     $post_id = $this->post->create([
    //         'user_id' => $user_id,
    //         'title' => $title,
    //         'description' => $description,
    //         'content' => $content,
    //         'seo_title' => $seo_title,
    //         'seo_description' => $seo_description,
    //         'seo_keywords' => $seo_keywords,
    //         'slug' => $slug,
    //         'thumbnail' => $thumbnailPath,
    //         'category_id' => $category_id,
    //         'status' => $status
    //     ]);
    //     if (!empty($tags)) {
    //         $this->post->attachTags($post_id, $tags);
    //     }

    //     header("Location: /");
    //     exit;
    // }











    public function db()
    {
        $homeModel = new TestModel();
        if ($homeModel->testConnection()) {
            echo "✅ Kết nối database thành công!";
        } else {
            echo "❌ Kết nối database thất bại!";
        }

    }
}
