<?php 
class User {
    public $id;
    public $email;
    public $senha;
    public $nome;
    public $sobrenome;
    public $cpf;
    public $idade;
    public $cep;
    public $endereco;
    public $numero;
    public $cidade;
    public $bairro;
    public $estado;
    public $token;

}
interface UserDAO {
    public function findByToken ($token);
    public function insert(User $u);
    public function findByEmail($email);
    public function findByCpf($cpf);
    public function update(User $u);
}