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
}
