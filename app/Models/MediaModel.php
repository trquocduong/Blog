<?php
class MediaModel extends Model
{
    //get file media/index
    public function show()
    {
        return $this->db->query("SELECT * FROM media ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    //add
    public function store($file_name, $file_path, $file_type, $alt_text)
    {
        $stmt = $this->db->prepare("INSERT INTO media (file_name,file_path,file_type,alt_text) VALUE (?,?,?,?)");
        return $stmt->execute([$file_name, $file_path, $file_type, $alt_text]);
    }
    //delete
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM media WHERE id =?");
        return $stmt->execute([$id]);
    }
    //search 

    public function search($keyword)
    {
        $stmt = $this->db->prepare("SELECT * FROM media WHERE file_name LIKE ? OR alt_text LIKE ? ORDER BY id DESC");
        $likeKeyword = "%" . $keyword . "%";
        $stmt->execute([$likeKeyword, $likeKeyword]);
        return $stmt->fetchAll();
    }
}
