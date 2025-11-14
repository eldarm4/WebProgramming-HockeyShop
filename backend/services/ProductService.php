<?php
require_once __DIR__ . '/../dao/ProductDao.php';
require_once 'BaseService.php';

class ProductService extends BaseService {

    public function __construct() {
        $dao = new ProductDao();
        parent::__construct($dao);
    }

    public function getProductsByCategory($category_id) {
        return $this->dao->getProductsByCategory($category_id);
    }
}
?>
