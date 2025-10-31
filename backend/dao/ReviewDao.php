<?php
require_once __DIR__ . '/BaseDao.php';

class ReviewDao extends BaseDao{
    public function __construct(){
        parent::__construct('reviews');
    }

    public function createReview($review){
        $data = [
            'product_id' => $review['product_id'],
            'user_id'    => $review['user_id'],
            'rating'     => $review['rating'],
            'title'      => $review['title'],
            'body'       => $review['body'],
            'created_at' => $review['created_at']
        ];
        return $this->insert($data);
    }

    public function getAllReviews(){
        return $this->getAll();
    }

    public function getReviewById($id){
        return $this->getById($id);
    }

    public function updateReview($id, $review){
        $data = [
            'product_id' => $review['product_id'],
            'user_id'    => $review['user_id'],
            'rating'     => $review['rating'],
            'title'      => $review['title'],
            'body'       => $review['body'],
            'created_at' => $review['created_at']
        ];
        return $this->update($id, $data);
    }

    public function deleteReview($id){
        return $this->delete($id);
    }
}
?>