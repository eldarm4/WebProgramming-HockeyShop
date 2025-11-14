<?php
require_once 'CartItemService.php';

$cart_item_service = new CartItemService();

try {
    $new_item = [
        'cart_id'    => 1,
        'product_id' => 2,
        'quantity'   => 3,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $result = $cart_item_service->create($new_item);
    echo "Cart item created successfully:\n";
    print_r($result);

    $items = $cart_item_service->getAll();
    echo "\nAll cart items:\n";
    print_r($items);

    $cart_items = $cart_item_service->getItemsByCartId(1);
    echo "\nItems in cart with ID = 1:\n";
    print_r($cart_items);

    if (!empty($result['id'])) {
        $single_item = $cart_item_service->getById($result['id']);
        echo "\nCart item by ID:\n";
        print_r($single_item);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
