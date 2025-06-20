<?php
class Post extends Model {
    public function getAll() {
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findBySlug($slug) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
