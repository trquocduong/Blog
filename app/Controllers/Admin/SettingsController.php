<?php
class SettingsController extends Controller
{
    private $settings;
    public function __construct()
    {
        $this->settings = new SettingsModel();
    }
    public function index()
    {
        $this->view('admin/pages/settings/index');
    }

    public function form()
    {
        $data['settings'] = $this->settings->getAll();
        $this->view('admin/pages/settings/form', $data);
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lưu các input text
            $this->settings->set('site_name', $_POST['site_name']);
            $this->settings->set('meta_title', $_POST['meta_title']);
            $this->settings->set('meta_description', $_POST['meta_description']);
            $this->settings->set('meta_keywords', $_POST['meta_keywords']);
            $this->settings->set('google_analytics', $_POST['google_analytics']);
            $this->settings->set('chatbot_script', $_POST['chatbot_script']);

            // Thư mục upload
            $uploadDir = __DIR__ . '/../../../public/uploads/settings/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Upload logo
            if (!empty($_FILES['logo']['name'])) {
                $logoFileName = 'logo.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $uploadPath = $uploadDir . $logoFileName;
                if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                    $this->settings->set('logo', '/uploads/settings/' . $logoFileName);
                }
            }

            // Upload favicon
            if (!empty($_FILES['favicon']['name'])) {
                $faviconName = 'favicon.' . pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
                $uploadPath = $uploadDir . $faviconName;
                if (move_uploaded_file($_FILES['favicon']['tmp_name'], $uploadPath)) {
                    $this->settings->set('favicon', '/uploads/settings/' . $faviconName);
                }
            }

            $_SESSION['toast'] = 'Cập nhật cài đặt thành công!';
            header('Location: /settings');
            exit;
        }
    }
}
