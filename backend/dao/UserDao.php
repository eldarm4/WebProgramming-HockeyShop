<?php
require_once __DIR__ . '/BaseDao.php';

class UserDao extends BaseDao{
    public function __construct(){
        parent::__construct('users');
    }

    public function createUser($user){
        $data = [
            'username'   => $user['username'],
            'email'      => $user['email'],
            'password'   => $user['password'],
            'created_at' => $user['created_at']
        ];
        return $this->insert($data);
    }

    public function getAllUsers(){
        return $this->getAll();
    }

    public function getUserById($id){
        return $this->getById($id);
    }

    public function updateUser($id, $user){
        $data = [
            'username'   => $user['username'],
            'email'      => $user['email'],
            'password'   => $user['password'],
            'created_at' => $user['created_at']
        ];
        return $this->update($id, $data);
    }

    public function deleteUser($id){
        return $this->delete($id);
    }
     public function getUserByEmail($email) {
        $stmt = $this->connection->prepare(
            "SELECT * FROM users WHERE email = :email"
        );
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>