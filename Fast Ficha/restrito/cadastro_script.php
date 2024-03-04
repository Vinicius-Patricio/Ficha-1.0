<?php    
    include 'conexao.php';
    session_start();         
    // error_reporting(0);

    if(isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['data_nascimento'], $_POST['data_atual'], $_POST['sexo'], $_POST['exp_treino'], $_POST['peso'], $_POST['altura'], $_SESSION['cod_pessoa'])) {
        
        // Atribuir valores dos campos do formulário a variáveis
        $nome = $_POST['nome'];        
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $data_atual = $_POST['data_atual'];
        $sexo = $_POST['sexo'];
        $exp_treino = $_POST['exp_treino'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $cod_pessoa = $_SESSION['cod_pessoa'];    

        if($cod_pessoa){
            $sql_prof = "SELECT cod_pessoa FROM users WHERE cod_pessoa = ?";
            $stmt_prof = $conn->prepare($sql_prof);
            $stmt_prof->bind_param("i", $cod_pessoa);
            $stmt_prof->execute();
            $result_prof = $stmt_prof->get_result();
        
            if($result_prof->num_rows > 0){

                $sql_aluno = "INSERT INTO `aluno` (`nome`, `email`, `telefone`, `data_nascimento`, `data_atual`, `sexo`, `exp_treino`, `peso`, `altura`, `cod_pessoa`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_aluno = $conn->prepare($sql_aluno);
                $stmt_aluno->bind_param("sssssssssi", $nome, $email, $telefone, $data_nascimento, $data_atual, $sexo, $exp_treino, $peso, $altura, $cod_pessoa);

                if($stmt_aluno->execute()){
                    $_SESSION['success_message'] = "$nome cadastrado com sucesso";

                }else{
                    $_SESSION['error_message'] = "Erro ao cadastrar aluno: " . $conn->error;
                }
            }else{
                $_SESSION['error_message'] = "Professor não encontrado.";
            }
        }else{
            $_SESSION['error_message'] = "ID do professor não encontado.";
        }
    }else{
    $_SESSION['error_message'] = "Erro de conexão";
    }
    header('location: cadastro.php');
    exit();