<?php
class TagsModel extends Model
{
    public function show()
    {
        return $this->db->query("SELECT * FROM tags ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filterByHide($hide)
    {
        $stmt = $this->db->prepare("SELECT * FROM tags WHERE hide = ?");
        $stmt->execute([$hide]);
        return $stmt->fetchAll();
    }

    public function countVisible()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM tags WHERE hide = 0");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function countHidden()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM tags WHERE hide = 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    public function detail($slug)
    {
        $stmt = $this->db->prepare("SELECT * FROM tags WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($name, $slug, $hide)
    {
        $stmt = $this->db->prepare("INSERT INTO tags (name,slug,hide) VALUE (?,?,?)");
        return $stmt->execute([$name, $slug, $hide]);
    }
    public function update($name, $newSlug, $hide, $oldSlug)
    {
        $stmt = $this->db->prepare("UPDATE tags SET name = ?, slug = ?, hide = ? WHERE slug = ?");
        return $stmt->execute([$name, $newSlug, $hide, $oldSlug]);
    }

    public function getIdBySlug($slug)
    {
        $stmt = $this->db->prepare("SELECT id FROM tags WHERE slug = ?");
        $stmt->execute([$slug]);
        $row = $stmt->fetch();
        return $row ? $row['id'] : null;
    }
    public function isTagUsed($tag_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM post_tags WHERE tag_id = ?");
        $stmt->execute([$tag_id]);
        $row = $stmt->fetch();
        return $row['total'] > 0;
    }

    public function delete($slug)
    {
        $stmt = $this->db->prepare("DELETE FROM tags WHERE slug = ?");
        return $stmt->execute([$slug]);
    }

    public function search($keyword)
    {
        $stmt = $this->db->prepare("SELECT * FROM tags WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function sortByCreatedAtDesc()
    {
        return $this->db->query("SELECT * FROM tags ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function sortByCreatedAtAsc()
    {
        return $this->db->query("SELECT * FROM tags ORDER BY created_at ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
