<?php 

    include("conexao.php");

   if(isset($_POST['id']) && isset($_POST['nome'])){
    
        $nome = $_POST['nome'];
        $sql = $conn->prepare("DELETE FROM aluno WHERE id_aluno = ?");
        $sql->bind_param("i", $id);
        $id = $_POST['id'];

        if($sql->execute()){
            $_SESSION['success_message'] = "$nome excluído com sucesso";
        }else{
            $_SESSION['error_message'] = "Erro na exclusão tente novamente. " . $conn->error;
        }
   }else{
        $_SESSION['error_message'] = "As credenciais não foram encotradas.";
   }
   var_dump($_SESSION);
   header('location: pesquisa.php');
   exit();