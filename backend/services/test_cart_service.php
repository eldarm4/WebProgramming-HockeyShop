<?php
require_once 'CartService.php';

$cart_service = new CartService();

try {
    $new_cart = [
        'user_id'    => 1,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $result = $cart_service->create($new_cart);
    echo "Cart created successfully:\n";
    print_r($result);

    $carts = $cart_service->getAll();
    echo "\nAll carts:\n";
    print_r($carts);

    $user_carts = $cart_service->getCartByUserId(1);
    echo "\nCarts for user ID = 1:\n";
    print_r($user_carts);

    if (!empty($result['id'])) {
        $cart = $cart_service->getById($result['id']);
        echo "\nCart by ID:\n";
        print_r($cart);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
