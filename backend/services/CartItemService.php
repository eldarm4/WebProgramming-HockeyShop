<?php
require_once __DIR__ . '/../dao/CartItemDao.php';
require_once 'BaseService.php';

class CartItemService extends BaseService {

    public function __construct() {
        $dao = new CartItemDao();
        parent::__construct($dao);
    }

    public function getItemsByCartId($cart_id) {
        return $this->dao->getItemsByCartId($cart_id);
    }
}
?>
