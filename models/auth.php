<?php 
require_once 'Dao/UserDaoMysql.php';
class Auth {
    private $pdo;
    private $base;

    public function __construct(PDO $pdo, $base) {
        $this->pdo = $pdo;
        $this->base = $base;
    }
    public function checkToken() {
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

           $UserDAO = new UserDaoMysql($this->pdo); 
           $user = $UserDAO->findByToken($token);
           if($user) {
            return $user;
           }
        }

        header("location: ".$this->base."index.php");
        exit;

    }
}