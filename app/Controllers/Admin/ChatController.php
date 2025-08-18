<?php

class ChatController extends Controller
{
    private $messages;
    private $user;
    public  function __construct()
    {
        $this->messages = new ChatModel();
        $this->user = new UsersModel();
    }
    public function index()
    {
        $users = $this->user->getAllAdminsExcept($_SESSION['user']['id']);
        $this->view('admin/pages/chat/index', ['users' => $users]);
    }
    public function room()
    {
        $currentUserId = $_SESSION['user']['id'];
        $otherUserId = $_GET['with'] ?? null;
        $users = $this->user->getAllAdminsExcept($_SESSION['user']['id']);
        if (!$otherUserId || $currentUserId == $otherUserId) {
            die('Lỗi chọn người chat');
        }


        $roomId = $this->messages->findOrCreateRoom($currentUserId, $otherUserId);
        // cập nhật tin nhắn đã đọc
        $this->messages->markMessagesAsRead($roomId, $currentUserId);

        $messages = $this->messages->getMessagesByRoomId($roomId);

        $receiver = $this->user->detail($otherUserId);

        $this->view('admin/pages/chat/room', [
            'room_id' => $roomId,
            'messages' => $messages,
            'receiver' => $receiver,
            'users' => $users,
        ]);
    }

    public function send()
    {
        $senderId = $_SESSION['user']['id'] ?? null;
        $roomId = $_POST['room_id'] ?? null;
        $message = trim($_POST['content'] ?? '');

        if ($senderId && $roomId && $message !== '') {
            $this->messages->sendMessage($senderId, $roomId, $message);
        }
        header("Location: /room?with=" . $_POST['receiver_id']);

        exit;
    }
}
