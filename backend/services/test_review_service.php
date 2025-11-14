<?php
require_once 'ReviewService.php';

$review_service = new ReviewService();

try {
    $new_review = [
        'product_id' => 1,      
        'user_id'    => 1,                   
        'rating'     => 5,
        'title'      => 'Amazing hockey stick!',
        'body'       => 'The best stick I have ever used. Perfect balance and control.',
        'created_at' => date('Y-m-d H:i:s')
    ];

    $result = $review_service->create($new_review);
    echo "Review created successfully:\n";
    var_dump($result);

    $reviews = $review_service->getAll();
    echo "\nAll reviews:\n";
    print_r($reviews);

    $product_reviews = $review_service->getReviewsByProductId(1);
    echo "\nReviews for product ID = 1:\n";
    print_r($product_reviews);

    if (!empty($reviews)) {
        $last_review = end($reviews);
        $review = $review_service->getById($last_review['id']);
        echo "\nReview by ID:\n";
        print_r($review);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
