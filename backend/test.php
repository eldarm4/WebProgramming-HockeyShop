<?php
require_once 'dao/UserDao.php';
require_once 'dao/ProductDao.php';
require_once 'dao/CartDao.php';
require_once 'dao/CartItemDao.php';
require_once 'dao/ReviewDao.php';

$userDao = new UserDao();
$productDao = new ProductDao();
$cartDao = new CartDao();
$cartItemDao = new CartItemDao();
$reviewDao = new ReviewDao();

$userDao->insert([
    'username'   => 'Mardddko Marković',
    'email'      => 'markdddo@example.com',
    'password'   => password_hash('test123', PASSWORD_DEFAULT),
    'created_at' => date('Y-m-d H:i:s')
]);

$productDao->insert([
    'category_id' => 1,
    'name'        => 'Stickk',
    'description' => 'good stick',
    'price_cents' => 1499,
    'image_url'   => 'https://pics.example/goodstick.jpg',
    'stock_qty'   => 100,
    'is_active'   => 1,
    'created_at'  => date('Y-m-d H:i:s')
]);

$cartDao->insert([
    'user_id'    => 1,
    'created_at' => date('Y-m-d H:i:s')
]);

$cartItemDao->insert([
    'cart_id'    => 1,
    'product_id' => 1,
    'quantity'   => 2,
    'created_at' => date('Y-m-d H:i:s')
]);

$reviewDao->insert([
    'product_id' => 1,
    'user_id'    => 1,
    'rating'     => 5,
    'title'      => 'Odličan proizvod!',
    'body'       => 'Radi brzo i jakoooo.',
    'created_at' => date('Y-m-d H:i:s')
]);

echo "\n=== USERS ===\n";
print_r($userDao->getAll());

echo "\n=== PRODUCTS ===\n";
print_r($productDao->getAll());

echo "\n=== CARTS ===\n";
print_r($cartDao->getAll());

echo "\n=== CART ITEMS ===\n";
print_r($cartItemDao->getAll());

echo "\n=== REVIEWS ===\n";
print_r($reviewDao->getAll());
?>
