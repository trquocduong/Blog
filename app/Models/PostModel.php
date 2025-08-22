<?php
class PostModel extends Model
{
    protected $table = 'posts';
    public function create($data)
    {

        $stmt = $this->db->prepare("INSERT INTO posts 
            (user_id, title, description, content, seo_title, seo_description, seo_keywords, slug, thumbnail, category_id, status, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

        $stmt->execute([
            $data['user_id'],
            $data['title'],
            $data['description'],
            $data['content'],
            $data['seo_title'],
            $data['seo_description'],
            $data['seo_keywords'],
            $data['slug'],
            $data['thumbnail'],
            $data['category_id'],
            $data['status']
        ]);

        return $this->db->lastInsertId();
    }

    public function attachTags($post_id, $tags)
    {
        $stmt = $this->db->prepare("INSERT INTO post_tags (post_id, tag_id) VALUES (?, ?)");
        foreach ($tags as $tag_id) {
            $stmt->execute([$post_id, $tag_id]);
        }
    }

    public function list_post($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function generateUniqueSlug($title)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $baseSlug = $slug;
        $i = 1;

        // kiểm tra xem slug đã tồn tại chưa
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM posts WHERE slug = ?");
        while (true) {
            $stmt->execute([$slug]);
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                break; // slug này chưa tồn tại => dùng luôn
            }

            $slug = $baseSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }


}
