<?php
session_start();
require_once(__DIR__ . '/../../../../Models/ChatModel.php');

$chatModel = new ChatModel();

$senderId = $_SESSION['user']['id'];
$roomId = $_POST['room_id'];
$message = trim($_POST['content']);

if ($message !== '') {
    $chatModel->sendMessage($senderId, $roomId, $message);
}
