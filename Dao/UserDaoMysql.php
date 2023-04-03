<?php
require_once 'models/user.php';

class UserDaoMysql implements UserDAO {
    private $pdo;

    public function __construct(PDO $drive) {
        $this->pdo = $drive;
    }

    public function generateUser($array) {
        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->email = $array['email'] ?? '';
        $u->nome = $array['nome'] ?? '';
        $u->sobrenome = $array['sobrenome'] ?? '';
        $u->cpf = $array['cpf'] ?? '';
        $u->idade = $array['idade'] ?? '';
        $u->cep = $array['cep'] ?? '';
        $u->endereco = $array['endereco'] ?? '';
        $u->numero = $array['numero'] ?? '';
        $u->cidade = $array['cidade'] ?? '';
        $u->estado = $array['estado'] ?? '';
        $u->bairro = $array['bairro'] ?? '';
        $u->token = $array['token'] ?? '';

        return $u;

    }

    public function findByToken($token){
        if(!empty($token)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();
        
            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }
}