<?php
require_once 'UserService.php';

$user_service = new UserService();

try {
    $new_user = [
        'username'   => 'testuser_' . rand(1000, 9999),
        'email'      => 'test_' . rand(1000, 9999) . '@example.com',
        'password'   => 'secret123',
        'created_at' => date('Y-m-d H:i:s')
    ];

    $result = $user_service->create($new_user);
    echo "User created successfully:\n";
    var_dump($result); 

    $users = $user_service->getAll();
    echo "\nAll users:\n";
    print_r($users);

    $email_to_search = $new_user['email'];
    $user_by_email = $user_service->getUserByEmail($email_to_search);

    echo "\nUser found by email ({$email_to_search}):\n";
    print_r($user_by_email);

    if (!empty($users)) {
        $latest_user = end($users);
        $user = $user_service->getById($latest_user['id']);
        echo "\nUser by ID:\n";
        print_r($user);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
