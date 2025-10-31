<?php
require_once __DIR__ . '/BaseDao.php';

class CartDao extends BaseDao{
    public function __construct(){
        parent::__construct('carts');
    }

    public function createCart($cart){
        $data = [
            'user_id'    => $cart['user_id'],
            'created_at' => $cart['created_at']
        ];
        return $this->insert($data);
    }

    public function getAllCarts(){
        return $this->getAll();
    }

    public function getCartById($id){
        return $this->getById($id);
    }

    public function updateCart($id, $cart){
        $data = [
            'user_id'    => $cart['user_id'],
            'created_at' => $cart['created_at']
        ];
        return $this->update($id, $data);
    }

    public function deleteCart($id){
        return $this->delete($id);
    }
}
?>