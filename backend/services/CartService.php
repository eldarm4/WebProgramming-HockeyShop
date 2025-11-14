<?php
require_once __DIR__ . '/../dao/CartDao.php';
require_once 'BaseService.php';

class CartService extends BaseService {

    public function __construct() {
        $dao = new CartDao();
        parent::__construct($dao);
    }

    public function getCartByUserId($user_id) {
        return $this->dao->getCartByUserId($user_id);
    }
}
?>
