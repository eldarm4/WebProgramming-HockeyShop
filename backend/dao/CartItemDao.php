<?php
require_once __DIR__ . '/BaseDao.php';

class CartItemDao extends BaseDao{
    public function __construct(){
        parent::__construct('cart_items');
    }

    public function createCartItem($cartItem){
        $data = [
            'cart_id'    => $cartItem['cart_id'],
            'product_id' => $cartItem['product_id'],
            'quantity'   => $cartItem['quantity'],
            'created_at' => $cartItem['created_at']
        ];
        return $this->insert($data);
    }

    public function getAllCartItems(){
        return $this->getAll();
    }

    public function getCartItemById($id){
        return $this->getById($id);
    }

    public function updateCartItem($id, $cartItem){
        $data = [
            'cart_id'    => $cartItem['cart_id'],
            'product_id' => $cartItem['product_id'],
            'quantity'   => $cartItem['quantity'],
            'created_at' => $cartItem['created_at']
        ];
        return $this->update($id, $data);
    }

    public function deleteCartItem($id){
        return $this->delete($id);
    }
      public function getItemsByCartId($cart_id) {
        $stmt = $this->connection->prepare(
            "SELECT * FROM cart_items WHERE cart_id = :cart_id"
        );
        $stmt->bindParam(':cart_id', $cart_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>