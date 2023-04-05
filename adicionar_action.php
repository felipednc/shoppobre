<?php 
require 'config.php';
require 'conexao.php';
require 'models/auth.php';

$nome = filter_input(INPUT_POST, 'nome'); 
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade');
$cpf = filter_input(INPUT_POST, 'cpf');
$senha = filter_input(INPUT_POST, 'senha');
$senha = base64_encode($senha);
$endereco = filter_input(INPUT_POST, 'endereco') ;
$numero = filter_input(INPUT_POST, 'numero') ;
$cidade = filter_input(INPUT_POST, 'cidade');
$estado =filter_input(INPUT_POST, 'estado') ;
$cep =filter_input(INPUT_POST, 'cep')  ;
$bairro = filter_input(INPUT_POST, 'bairro');

if ($nome && $sobrenome && $email && $idade && $cpf && $senha && $endereco && $numero && $cidade && $estado && $cep && $bairro) {

  if($auth->emailExists($email) === false) {

  }else {
    $_SESSION['flash'] = 'E-mail já utilizado!';
    header("location:".$base."index.php");
  }

  if($auth->cpfExists($cpf) === false) {
    
      $auth->registerUser($name, $email, $sobrenome, $idade, $cpf, $senha, $endereco, $numero, $cidade, $estado, $cep, $bairro);
      header("location:".$base."login.php");

  }else {
    $_SESSION['flash'] = 'CPF já utilizado!';
    header("location:".$base."index.php");
  }



}


