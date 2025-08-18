<?php
class PageModel extends Model
{
    public function show()
    {
        return $this->db->query("SELECT * FROM pages ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $slug, $content, $hide, $seo_title = '', $seo_description = '')
    {
        $stmt = $this->db->prepare("INSERT INTO pages (title, slug, content, hide, seo_title, seo_description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $slug, $content, $hide, $seo_title, $seo_description]);
    }

    public function find($slug)
    {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $slug, $content, $hide, $seo_title = '', $seo_description = '')
    {
        $stmt = $this->db->prepare("UPDATE pages SET title = ?, slug = ?, content = ?, hide = ?, seo_title = ?, seo_description = ? WHERE id = ?");
        $stmt->execute([$title, $slug, $content, $hide, $seo_title, $seo_description, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pages WHERE id = ?");
        $stmt->execute([$id]);
    }
    public function filterByHide($hide)
    {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE hide = ?");
        $stmt->execute([$hide]);
        return $stmt->fetchAll();
    }

    public function findBySlug($slug)
    {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE slug = ? AND hide = 0 LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function search($keyword)
    {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE title LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPaginatedPermissions($limit, $offset)
    {
        $sql = "SELECT * FROM pages LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPermissions()
    {
        $sql = "SELECT COUNT(*) FROM pages";
        $stmt = $this->db->query($sql);
        return $stmt->fetchColumn();
    }

    public function getFilteredPaginatedPermissions($hide, $limit, $offset)
    {
        $sql = "SELECT * FROM pages WHERE hide = :hide LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countFiltered($hide)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM pages WHERE hide = :hide");
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
