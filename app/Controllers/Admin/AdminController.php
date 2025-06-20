<?php
class AdminController extends Controller {
    public function admin() {
        $this->view('admin/pages/home/index');
    }
   public function save_theme() {
        // Thực hiện lưu file JSON
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newColor = $_POST["main_color"];
            $configPath = __DIR__ . '/../../theme.json';
            $config = json_decode(file_get_contents($configPath), true);
            $config['main_color'] = $newColor;
            file_put_contents($configPath, json_encode($config, JSON_PRETTY_PRINT));
            header("Location: /admin");
            exit;
        }
    }
    public function color(){
        $this->view('admin/pages/widget/color');
    }
    public function media(){
        $this->view('admin/pages/media/media');
    }
}

