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
    public function validateLogin($cpf, $senha) {
        $UserDAO = new UserDaoMysql($this->pdo); 
        $user = $UserDAO->findByCpf($cpf);

        if($user) {
            if(password_verify($senha, $user -> senha)){
                $token = md5(time().rand(0, 9999));

                $_SESSION['token'] = $token;
                $user->token = $token;
                $UserDAO->update($user);
            }

        }

        return false;
    }
    public function cpfExists($cpf) {
        $userDAO = new UserDaoMysql($this->pdo);
        return $userDAO->findByCpf($cpf) ? true : false;
    }

    public function emailExists($email) {
        $userDAO = new UserDaoMysql($this->pdo);
        return $userDAO->findByEmail($email) ? true : false;
    }

    public function registerUser($nome, $sobrenome, $email, $idade, $cpf, $senha, $endereco, $numero, $cidade, $estado, $cep, $bairro) {

        $userDAO = new UserDaoMysql($this->pdo);

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999));

        $newUser = new User ();
        $newUser->nome = $nome;
        $newUser->sobrenome = $sobrenome;
        $newUser->idade = $idade;
        $newUser->cpf = $cpf;
        $newUser->email = $email;
        $newUser->senha = $hash;
        $newUser->endereco = $endereco;
        $newUser->numero = $numero;
        $newUser->cidade = $cidade;
        $newUser->estado = $estado;
        $newUser->cep = $cep;
        $newUser->bairro = $bairro;
        $newUser->token = $token;

        $userDAO->insert($newUser);

        $_SESSION['token'] = $token;

    }

}