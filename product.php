<?php
require_once 'database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($name, $price, $stock, $category_id) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price, stock, category_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $price, $stock, $category_id]);
    }    

    public function getAll() {
        $query = "SELECT products.*, categories.name AS category 
                  FROM products 
                  JOIN categories ON products.category_id = categories.id";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $price, $stock, $category_id) {
        $stmt = $this->db->prepare("UPDATE products SET name=?, price=?, stock=?, category_id=? WHERE id=?");
        return $stmt->execute([$name, $price, $stock, $category_id, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
