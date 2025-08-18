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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];
            $content = $_POST['content'];
            $thumbnail = $_POST['thumbnail'];
            $category_id = $_POST['category_id'];
            $user_id = $_SESSION['user']['id'] ?? 1;

            $data = [
                'user_id' => $user_id,
                'title' => $title,
                'slug' => $slug,
                'seo_title' => $seo_title,
                'seo_description' => $seo_description,
                'seo_keywords' => $seo_keywords,
                'content' => $content,
                'thumbnail' => $thumbnail,
                'category_id' => $category_id,
                'status' => 'draft'
            ];
            $this->post->insert($data);
            header("Location: /posts");
            exit;
        }
    }
}
