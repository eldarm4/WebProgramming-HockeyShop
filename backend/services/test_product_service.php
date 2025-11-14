<?php
require_once 'ProductService.php';

$product_service = new ProductService();

try {
    $new_product = [
        'category_id' => 1,
        'name'        => 'Hockey Stick Pro X',
        'description' => 'High-performance carbon fiber hockey stick.',
        'price_cents' => 12999,
        'image_url'   => 'stick_pro_x.jpg',
        'stock_qty'   => 15,
        'is_active'   => 1,
        'created_at'  => date('Y-m-d H:i:s')
    ];

    $result = $product_service->create($new_product);
    echo "Product created successfully:\n";
    print_r($result);

    $products = $product_service->getAll();
    echo "\nAll products:\n";
    print_r($products);

    $category_products = $product_service->getProductsByCategory(1);
    echo "\nProducts in category ID = 1:\n";
    print_r($category_products);

    if (!empty($result['id'])) {
        $product = $product_service->getById($result['id']);
        echo "\nProduct by ID:\n";
        print_r($product);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
