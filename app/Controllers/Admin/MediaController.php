<?php
class MediaController extends Controller
{
    private $media;
    public function __construct()
    {
        $this->media = new MediaModel();
    }

    public function index()
    {
        $keyword = isset($_GET['q']) ? trim($_GET['q']) : null;
        if (!empty($keyword)) {
            $media = $this->media->search($keyword);
        } else {
            $media = $this->media->show();
        }
        $this->view('admin/pages/media/index', ['media' => $media]);
    }

    public function create()
    {
        $this->view('admin/pages/media/upload');
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media'])) {
            $files = $_FILES['media'];
            $altText = $_POST['alt_text'] ?? '';
            $uploadDir = __DIR__ . '/../../../public/uploads/media/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            for ($i = 0; $i < count($files['name']); $i++) {
                if ($files['error'][$i] === 0) {
                    $fileName = basename($files['name'][$i]);
                    $fileType = $files['type'][$i];
                    $newFileName = time() . '_' . $fileName;
                    $filePath = 'uploads/media/' . $newFileName;
                    if (move_uploaded_file($files['tmp_name'][$i], $uploadDir . $newFileName)) {
                        $this->media->store($fileName, $filePath, $fileType, $altText);
                    }
                }
            }
            $_SESSION['toast'] = 'Thêm vào media thành công!';
            header('Location: /media');
            exit;
        }
        $_SESSION['toast_error'] = "Thêm vào media thất bại! ";
        include __DIR__ . '/../../Views/admin/pages/media/upload.php';
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->media->delete($_GET['id']);
        }
        $_SESSION['toast'] = 'Xoá media thành công!';
        header('Location: /media');
    }
}
