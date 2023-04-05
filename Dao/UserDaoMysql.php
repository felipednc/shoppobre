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


    public function findByCpf($cpf){
        if(!empty($cpf)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE cpf = :cpf");
            $sql->bindValue(':cpf', $cpf);
            $sql->execute();
        
            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }

    public function findByEmail($email){
        if(!empty($email)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();
        
            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }

    public function update(User $u) {
        $sql = $this->pdo->prepare("UPDATE usuario SET 

        nome = :nome,
        sobrenome = :sobrenome,
        cpf = :cpf,
        senha = :senha,
        email = :email,
        idade = :idade,
        cep = :cep,
        endereco = :endereco,
        numero = :numero,
        cidade = :cidade,
        bairro = :bairro,
        estado = :estado,
        token = :token
        WHERE id = :id");

        $sql->bindValue(':cpf', $u->cpf);
        $sql->bindValue(':senha', $u->senha);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':nome', $u->nome);
        $sql->bindValue(':sobrenome', $u->sobrenome);
        $sql->bindValue(':idade', $u->idade);
        $sql->bindValue(':cep', $u->cep);
        $sql->bindValue(':endereco', $u->endereco);
        $sql->bindValue(':numero', $u->numero);
        $sql->bindValue(':id', $u->id);
        $sql->bindValue(':cidade', $u->cidade);
        $sql->bindValue(':bairro', $u->bairro);
        $sql->bindValue(':estado', $u->estado);
        $sql->bindValue(':token', $u->token);
        $sql->execute();

        return true;


    }

    public function insert(User $u) {
        $sql =$this->pdo->prepare("INSERT INTO usuario (
        nome, sobrenome,  cpf, senha, email,  idade,  cep, endereco,  numero,  cidade, bairro, estado, token
        ) VALUES (
        :nome, :sobrenome, :cpf, :senha, :email, :idade, :cep, :endereco, :numero, :cidade, :bairro, :estado, :token
        )");

        $sql->bindValue(':nome', $u->nome);
        $sql->bindValue(':sobrenome', $u->sobrenome);
        $sql->bindValue(':cpf', $u->cpf);
        $sql->bindValue(':senha', $u->senha);
        $sql->bindValue(':idade', $u->idade);
        $sql->bindValue(':endereco', $u->endereco);
        $sql->bindValue(':cep', $u->cep);
        $sql->bindValue(':numero', $u->numero);
        $sql->bindValue(':cidade', $u->cidade);
        $sql->bindValue(':bairro', $u->bairro);
        $sql->bindValue(':estado', $u->estado);
        $sql->bindValue(':token', $u->token);
        $sql->execute();
        
        return true;

    }


}