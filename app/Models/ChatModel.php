<?php
class ChatModel extends Model
{
    public function get_messages($id)
    {
        $stmt = $this->db->prepare('SELECT m.*, u.name FROM messages m JOIN users u ON m.sender_id = u.id WHERE m.room_id = ? ORDER BY m.created_at ASC');
        $stmt->execute($id);
        return $stmt->fetchAll();
    }
    public function send_messages($sender_id, $room_id, $messages, $type = 'TEXT')
    {
        $stmt = $this->db->prepare('INSERT INTO messgaes (sender_id,room_id,messages_type,created_at)VALUE(?,?,?,?,NOW())');
        return $stmt->execute([$sender_id, $room_id, $messages, $type]);
    }
    public function getroombuyuser($id)
    {
        $stmt = $this->db->prepare("SELECT r.* FROM rooms r JOIN room_members rm ON r.id = rm.room_id WHERE rm.user_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function setuseroln($status, $user_id)
    {
        $stmt = $this->db->prepare("UPDATE users SET online = ? WHERE id = ?");
        return $stmt->execute([$status, $user_id]);
    }
    public function markMessagesAsRead($userId, $roomId)
    {
        $stmt = $this->db->prepare("
        UPDATE messages
        SET is_read = 1
        WHERE room_id = ? AND sender_id != ? AND is_read = 0
    ");
        $stmt->execute([$roomId, $userId]);
    }
    public function countUnreadMessages($userId, $roomId)
    {
        $stmt = $this->db->prepare("
        SELECT COUNT(*) AS total FROM messages
        WHERE room_id = ? AND sender_id != ? AND is_read = 0
    ");
        $stmt->execute([$roomId, $userId]);
        return $stmt->fetch()['total'];
    }
}
