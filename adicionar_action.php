<?php 
require 'conexao.php';
/* Variaveis Usadas */
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
/* Fim variaveis */

/*  Criado as condições para adicionar direto no BD */
if($nome && $email && $sobrenome && $idade && $cpf && $senha && $endereco && $numero && $cidade && $estado && $cep && $bairro ) {

    
    $sql = $pdo->prepare("SELECT *FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);      /* Usado para não repetir um email ja utilizado */
    $sql ->execute();


    if($sql->rowCount() === 0){
    $sql = $pdo->prepare("INSERT INTO usuario (nome, sobrenome, email, idade, cpf, senha, endereco, numero, cidade, estado, cep, bairro ) VALUES (:nome, :sobrenome, :email, :idade, :cpf, :senha, :endereco, :numero, :cidade, :estado, :cep, :bairro)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':sobrenome', $sobrenome);
    $sql->bindValue(':email', $email);              /* usado para inserir dentro do banco as informações */
    $sql->bindValue(':idade', $idade);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':estado', $estado);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':bairro', $bairro);
    $sql ->execute();
    header("location: index.php");
    exit;
  }else {
    header("Location: conexao.php"); /* para verificar se existe algum erro, se ocorre algum erro e direcionado a pagina (CONFIG.PHP) */
    exit;
  };
    
}else {
header("Location: conexao.php");  /* aqui a mesma coisa, se ocorre algum erro */
exit;
}


