<?php
class SettingsModel extends Model
{


    public function get($key)
    {
        $stmt = $this->db->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
        $stmt->execute([$key]);
        return $stmt->fetchColumn();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM settings");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($rows as $row) {
            $data[$row['setting_key']] = $row['setting_value'];
        }
        return $data;
    }

    public function set($key, $value)
    {
        $stmt = $this->db->prepare("
            INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)
            ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)
        ");
        // khi trùng khoá ngoại hoặc khoá chính thì chạy lệnh update thay gì insert into 
        return $stmt->execute([$key, $value]);
    }
}
