<?php
require_once __DIR__ . '/BaseDao.php';

class ProductDao extends BaseDao{
    public function __construct(){
        parent::__construct('products');
    }

    public function createProduct($product){
        $data = [
            'category_id' => $product['category_id'],
            'name'        => $product['name'],
            'description' => $product['description'],
            'price_cents' => $product['price_cents'],
            'image_url'   => $product['image_url'],
            'stock_qty'   => $product['stock_qty'],
            'is_active'   => $product['is_active'],
            'created_at'  => $product['created_at']
        ];
        return $this->insert($data);
    }

    public function getAllProducts(){
        return $this->getAll();
    }

    public function getProductById($id){
        return $this->getById($id);
    }

    public function updateProduct($id, $product){
        $data = [
            'category_id' => $product['category_id'],
            'name'        => $product['name'],
            'description' => $product['description'],
            'price_cents' => $product['price_cents'],
            'image_url'   => $product['image_url'],
            'stock_qty'   => $product['stock_qty'],
            'is_active'   => $product['is_active'],
            'created_at'  => $product['created_at']
        ];
        return $this->update($id, $data);
    }

    public function deleteProduct($id){
        return $this->delete($id);
    }
      public function getProductsByCategory($category_id) {
        $stmt = $this->connection->prepare(
            "SELECT * FROM products WHERE category_id = :category_id"
        );
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>