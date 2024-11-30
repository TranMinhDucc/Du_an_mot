<?php

require_once '../connect/connect.php';

class Settings extends Connect
{
    public function getAllSetting()
    {
        $sql = "SELECT * FROM settings";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateSetting($id, $content)
    {
        $sql = "UPDATE settings SET content = :content WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }






    // Lấy toàn bộ dữ liệu cài đặt

}
