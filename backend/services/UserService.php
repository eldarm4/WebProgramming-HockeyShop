<?php
require_once __DIR__ . '/../dao/UserDao.php';
require_once 'BaseService.php';

class UserService extends BaseService {

    public function __construct() {
        $dao = new UserDao();
        parent::__construct($dao);
    }

    public function getUserByEmail($email) {
        return $this->dao->getUserByEmail($email);
    }
}
?>
