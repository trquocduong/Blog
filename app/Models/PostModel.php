<?php
class PostModel extends Model
{
    protected $table = 'posts';
    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table} 
        (user_id, title, seo_title, seo_description, seo_keywords, slug, content, thumbnail, category_id, status, created_at, updated_at) 
        VALUES (:user_id, :title, :seo_title, :seo_description, :seo_keywords, :slug, :content, :thumbnail, :category_id, :status, NOW(), NOW())";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
}
