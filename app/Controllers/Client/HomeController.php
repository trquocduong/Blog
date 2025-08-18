<?php
class HomeController extends Controller
{
    private $category, $tags, $users;
    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->tags = new TagsModel();
        $this->users = new UsersModel();
    }
    public function index()

    {
        $category = $this->category->show();
        $tags = $this->tags->show();
        $users = $this->users->index();
        $this->view('client/home/index', ['category' => $category, 'tags' => $tags, 'users' => $users]);
    }
    public function db()
    {
        $homeModel = new TestModel();
        if ($homeModel->testConnection()) {
            echo "✅ Kết nối database thành công!";
        } else {
            echo "❌ Kết nối database thất bại!";
        }

        // Gọi view nếu cần
        // $this->view('home/index');
    }
}
