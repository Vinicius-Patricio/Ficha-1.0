<?php
  session_start();

  if(empty($_POST) || empty($_POST['login']) || empty($_POST['senha'])){
    header('location: login.php');
    exit;
  }   

include 'restrito/conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM users WHERE login = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $login);

$stmt->execute();

$res = $stmt->get_result();

if($res->num_rows > 0){
    
    $row = $res->fetch_object();
    
    if(password_verify($senha, $row->senha)){
        $_SESSION['login'] = $login;
        $_SESSION['professor'] = $row->professor;
        $_SESSION['cod_pessoa'] = $row->cod_pessoa;

        header('location: restrito/index.php');
        exit;
    }else{
        $_SESSION['error_message'] = "Usuário e/ou senha inválidos.";
        header('location: login.php');
        exit;
    }
}else{
    $_SESSION['error_message'] = "Usuário e/ou senha inválidos.";
    header('location: login.php');
    exit;
}

$stmt->close();
$conn->close();
    
  