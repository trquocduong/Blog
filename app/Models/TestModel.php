<?php
class TestModel extends Model
{
    public function __construct()
    {
        parent::__construct(); // gọi hàm trong Model.php
    }

    public function testConnection()
    {
        try {
            $stmt = $this->db->query("SELECT 1"); // test truy vấn đơn giản
            return true;
        } catch (PDOException $e) {
            echo "❌ Lỗi truy vấn DB: " . $e->getMessage();
            return false;
        }
    }
}
