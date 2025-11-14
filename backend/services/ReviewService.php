<?php
require_once __DIR__ . '/../dao/ReviewDao.php';
require_once 'BaseService.php';

class ReviewService extends BaseService {

    public function __construct() {
        $dao = new ReviewDao();
        parent::__construct($dao);
    }

    public function getReviewsByProductId($product_id) {
        return $this->dao->getReviewsByProductId($product_id);
    }
}
?>
