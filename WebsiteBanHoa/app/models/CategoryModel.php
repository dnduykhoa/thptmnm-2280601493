<?php
class CategoryModel 
{
    private $conn;
    private $table_name = "category";

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function getCategories() 
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryById($id) 
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addCategory($name) 
    {
        $query = "INSERT INTO " . $this->table_name . " (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        
        $name = htmlspecialchars(strip_tags($name));
        $stmt->bindParam(':name', $name);

        return $stmt->execute();
    }

    public function updateCategory($id, $name) 
    {
        $query = "UPDATE " . $this->table_name . " SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        $name = htmlspecialchars(strip_tags($name));
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function deleteCategory($id) 
    {
        // Kiểm tra xem danh mục có sản phẩm nào liên quan không
        $query = "SELECT COUNT(*) FROM product WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product_count = $stmt->fetchColumn();

        if ($product_count > 0) {
            return false; // Không xóa được vì có sản phẩm liên quan
        }

        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>