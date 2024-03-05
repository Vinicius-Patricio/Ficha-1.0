<?php
    session_start();
    include("restrito/conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['professor'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cnpj = $_POST['cnpj'];
        $login = $_POST['login'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        if (!valid_cnpj($cnpj)) {                        
            $_SESSION['error_message'] = "CNPJ inválido.";
        } else {
            $sql = "INSERT INTO `users`(`professor`, `endereco`, `telefone`, `email`, `cnpj`, `login`, `senha`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $nome, $endereco, $telefone, $email, $cnpj, $login, $senha);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "$nome cadastrado com sucesso!";
            } else {
                $_SESSION['error_message'] = "$nome Erro no cadastro.";
            } 
        }
    }
    
    header('location: cadastro_prof.php');
    exit();

