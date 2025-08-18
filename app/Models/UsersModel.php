<?php
class UsersModel extends Model
{
    public function register($email, $phone, $role, $password)
    {
        $img = '/uploads/default.png';
        $sql = "INSERT INTO users (email, phone, role,password, img) VALUES (?, ?, ?, ?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$email, $phone, $role, password_hash($password, PASSWORD_DEFAULT), $img]);
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function index()
    {
        return $this->db->query("SELECT * FROM users ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filterByHide($hide)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE hide = ?");
        $stmt->execute([$hide]);
        return $stmt->fetchAll();
    }
    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($img, $name, $email, $phone, $password, $hide, $role)
    {
        $stmt = $this->db->prepare("INSERT INTO users (img,name,email,phone,password,hide,role) VALUE (?,?,?,?,?,?,?)");
        return $stmt->execute([$img, $name, $email, $phone, $password, $hide, $role]);
    }
    public function update($id, $img, $name, $email, $phone, $password, $hide, $role)
    {
        if ($password) {
            // Có thay đổi mật khẩu
            $stmt = $this->db->prepare("UPDATE users SET img=? ,name=?, email=?, phone=?, password=?, hide=?, role=? WHERE id=?");
            return $stmt->execute([$img, $name, $email, $phone, $password, $hide, $role, $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE users SET img=?, name=?, email=?, phone=?, hide=?, role=?  WHERE id=?");
            return $stmt->execute([$img, $name, $email, $phone, $hide, $role, $id]);
        }
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function search($keyword)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email LIKE ? OR name LIKE ?");
        $stmt->execute(["%$keyword%", "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // phaan trang
    public function getPaginatedPermissions($limit, $offset)
    {
        $sql = "SELECT * FROM users LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPermissions()
    {
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchColumn();
    }
    public function getFilteredPaginatedPermissions($hide, $limit, $offset)
    {
        $sql = "SELECT * FROM users WHERE hide = :hide LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countFiltered($hide)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE hide = :hide");
        $stmt->bindValue(':hide', $hide, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getAllAdminsExcept($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE role = 0 AND id != ? ORDER BY (UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(last_active) <= 60) DESC, name ASC");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function updateLastActive($userId, $time = null)
    {
        $time = $time ?? date('Y-m-d H:i:s');
        $stmt = $this->db->prepare("UPDATE users SET last_active = ? WHERE id = ?");
        $stmt->execute([$time, $userId]);
    }
    public function updateprofile($id, $img, $name, $email, $phone)
    {
        $stmt = $this->db->prepare("
        UPDATE users 
        SET img = ?, name = ?, email = ?, phone = ?
        WHERE id = ?
    ");
        return $stmt->execute([$img, $name, $email, $phone, $id]);
    }
    public function repassword($id, $password)
    {
        if (!$password) {
            return false;
        }
        $stmt = $this->db->prepare("UPDATE users SET password=? WHERE id=?");
        return $stmt->execute([password_hash($password, PASSWORD_DEFAULT), $id]);
    }
}
