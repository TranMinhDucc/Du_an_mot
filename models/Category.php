<?php
require_once '../connect/connect.php';
class Category extends connect
{
    public function listCategory()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function create($name, $status, $image, $description)
    {
        $sql = "INSERT INTO categories(name, status, image, description) values(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $status, $image, $description]);
    }

    public function update($id, $name, $status, $image, $description)
    {
        $sql = "UPDATE categories SET name=?, image=?, status=?, description=? WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $status, $description, $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function detail()
    {
        $sql = "SELECT * FROM categories WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
