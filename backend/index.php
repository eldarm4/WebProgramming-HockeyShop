<?php
    require 'vendor/autoload.php';

    require_once __DIR__ . '/services/CartItemService.php';
    Flight::register('cartItemService', 'CartItemService');
    require_once __DIR__ . '/routes/CartItemRoutes.php';

    require_once __DIR__ . '/services/CartService.php';
    Flight::register('cartService', 'CartService');
    require_once __DIR__ . '/routes/cartroutes.php';

    require_once __DIR__ . '/services/ProductService.php';
    Flight::register('productService', 'ProductService');
    require_once __DIR__ . '/routes/productRoutes.php';

    require_once __DIR__ . '/services/ReviewService.php';
    Flight::register('reviewService', 'ReviewService');
    require_once __DIR__ . '/routes/reviewRoutes.php';

    require_once __DIR__ . '/services/UserService.php';
    Flight::register('userService', 'UserService');
    require_once __DIR__ . '/routes/userRoutes.php';


    Flight::start();
?>
