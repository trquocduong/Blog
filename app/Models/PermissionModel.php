<?php
class PermissionModel extends Model
{
    public function getAllUsers()
    {
        return $this->db->query("SELECT id, email FROM users")->fetchAll();
    }

    public function getAllPermissions()
    {
        return $this->db->query("SELECT * FROM permissions WHERE hide = 0")->fetchAll();
    }

    public function getUserPermissionIds($userId)
    {
        $stmt = $this->db->prepare("SELECT permission_id FROM user_permissions WHERE user_id = ?");
        $stmt->execute([$userId]);
        return array_column($stmt->fetchAll(), 'permission_id');
    }

    public function updateUserPermissions($userId, $permissions)
    {
        $this->db->prepare("DELETE FROM user_permissions WHERE user_id = ?")->execute([$userId]);
        $stmt = $this->db->prepare("INSERT INTO user_permissions(user_id, permission_id) VALUES (?, ?)");
        foreach ($permissions as $permId) {
            $stmt->execute([$userId, $permId]);
        }
    }

    public function addPermission($name, $key_code, $hide)
    {
        $stmt = $this->db->prepare("INSERT INTO permissions(name, key_code,hide) VALUES (?, ?,?)");
        $stmt->execute([$name, $key_code, $hide]);
    }
    //ẩn quyền

    public function togglePermissionVisibility($id)
    {
        $stmt = $this->db->prepare("UPDATE permissions SET hide = 1 - hide WHERE id = ?");
        $stmt->execute([$id]);
    }
    // phân quyền 
    public function hasPermission($userId, $key_code)
    {
        $sql = "SELECT COUNT(*) as count
            FROM user_permissions up
            JOIN permissions p ON up.permission_id = p.id
            WHERE up.user_id = ? AND p.key_code = ? AND p.hide = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $key_code]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
    public function getFilteredPaginatedPermissions($hide, $limit, $offset)
    {
        $sql = "SELECT * FROM permissions WHERE hide = :hide LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countFiltered($hide)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM permissions WHERE hide = :hide");
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // phân trang
    public function getPaginatedPermissions($limit, $offset)
    {
        $sql = "SELECT * FROM permissions LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPermissions()
    {
        $sql = "SELECT COUNT(*) FROM permissions";
        $stmt = $this->db->query($sql);
        return $stmt->fetchColumn();
    }
    // thống kê quyền 
    public function countByHide($hide)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM permissions WHERE hide = ?");
        $stmt->execute([$hide]);
        return $stmt->fetchColumn();
    }
}
