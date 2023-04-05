<?php 
require 'config.php';
require 'conexao.php';
require 'models/auth.php';

$cpf = filter_input(INPUT_POST, 'cpf');
$senha = filter_input(INPUT_POST, 'senha');

if($cpf && $senha) {

    $auth = new Auth($pdo, $base);

    if($auth->validateLogin($cpf, $senha)) {
        header("location:".$base."login.php");
        exit;
    }

}



header("location: ".$base."index.php");


