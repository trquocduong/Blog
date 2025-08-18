<?php
class ChatModel extends Model
{
    // Lấy tất cả tin nhắn trong 1 phòng
    public function getMessagesByRoomId($roomId)
    {
        $stmt = $this->db->prepare("
            SELECT m.*, u.name 
            FROM messages m 
            JOIN users u ON m.sender_id = u.id 
            WHERE m.room_id = ? 
            ORDER BY m.created_at ASC
        ");
        if (is_array($roomId)) {
            $roomId = $roomId[0];
        }
        $stmt->execute([$roomId]);
        return $stmt->fetchAll();
    }

    // Gửi tin nhắn mới
    public function sendMessage($senderId, $roomId, $content, $type = 'TEXT')
    {
        $stmt = $this->db->prepare("
            INSERT INTO messages (sender_id, room_id, content, type, created_at, is_read) 
            VALUES (?, ?, ?, ?, NOW(), 0)
        ");
        return $stmt->execute([$senderId, $roomId, $content, $type]);
    }

    // Tìm phòng chat giữa 2 người
    public function findOrCreateRoom($user1Id, $user2Id)
    {
        // Kiểm tra phòng đã tồn tại
        $stmt = $this->db->prepare("
            SELECT * FROM rooms 
            WHERE (user1_id = ? AND user2_id = ?) 
               OR (user1_id = ? AND user2_id = ?)
        ");
        $stmt->execute([$user1Id, $user2Id, $user2Id, $user1Id]);
        $room = $stmt->fetch();

        if ($room) return $room['id'];

        // Tạo mới
        $stmt = $this->db->prepare("INSERT INTO rooms (user1_id, user2_id, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$user1Id, $user2Id]);
        $roomId = $this->db->lastInsertId();

        // Thêm vào bảng room_members
        $stmt = $this->db->prepare("
            INSERT INTO room_members (room_id, user_id) VALUES (?, ?), (?, ?)
        ");
        $stmt->execute([$roomId, $user1Id, $roomId, $user2Id]);
        $roomId = $this->db->lastInsertId();

        return $roomId;
    }

    // Đánh dấu tin nhắn đã đọc
    public function markMessagesAsRead($roomId, $userId)
    {
        $stmt = $this->db->prepare("
            UPDATE messages 
            SET is_read = 1 
            WHERE room_id = ? AND sender_id != ? AND is_read = 0
        ");
        $stmt->execute([$roomId, $userId]);
    }
    // Lấy tất cả các room mà user đang tham gia
    public function getRoomsByUserId($userId)
    {
        $stmt = $this->db->prepare("
            SELECT r.* 
            FROM rooms r 
            JOIN room_members rm ON r.id = rm.room_id 
            WHERE rm.user_id = ?
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    public function countUnreadMessages($userId)
    {
        $stmt = $this->db->prepare("
        SELECT r.id AS room_id, COUNT(m.id) AS unread_count
        FROM rooms r
        JOIN messages m ON r.id = m.room_id
        WHERE m.receiver_id = ? AND m.is_read = 0
        GROUP BY r.id
    ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
