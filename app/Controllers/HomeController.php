<?php
class HomeController extends Controller
{
    public function index()
    {
        $this->view('client/home/index');
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
