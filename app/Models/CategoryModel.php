<?php
class CategoryModel extends Model
{
    public function show()
    {
        return $this->db->query('SELECT * FROM categories ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $note, $hide)
    {
        $stmt = $this->db->prepare("INSERT INTO categories (name,note,hide) VALUE (?,?,?)");
        return $stmt->execute([$name, $note, $hide]);
    }

    public function update($id, $name, $hide, $note)
    {
        $stmt = $this->db->prepare("UPDATE categories SET name = ?, hide = ?, note = ? WHERE id = ?");
        return $stmt->execute([$name, $hide, $note, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function iscategory($category_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM posts WHERE category_id = ?");
        $stmt->execute([$category_id]);
        $row = $stmt->fetch();
        return $row['total'] > 0;
    }
    public function search($keyword)
    {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaginatedPermissions($limit, $offset)
    {
        $sql = "SELECT * FROM categories LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPermissions()
    {
        $sql = "SELECT COUNT(*) FROM categories";
        $stmt = $this->db->query($sql);
        return $stmt->fetchColumn();
    }

    public function getFilteredPaginatedPermissions($hide, $limit, $offset)
    {
        $sql = "SELECT * FROM categories WHERE hide = :hide LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countFiltered($hide)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM categories WHERE hide = :hide");
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function filterByHide($hide)
    {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE hide = ?");
        $stmt->execute([$hide]);
        return $stmt->fetchAll();
    }
}
