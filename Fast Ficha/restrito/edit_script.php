<?php 
    include("conexao.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">

  <title>Alteração de Cadastro</title>
</head>
<body class="bg-black" style="color: #FFD700">

    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid bg-black">
        <a class="navbar-brand" href="index.php"><h2 class="rounded">FF</h2></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 5px">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php"><b>Cadastrar Alunos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pesquisa.php"><b>Editar</b></a>
                </li>  
                </ul>  
                <span>
                <?php             
                    $part= explode(" ", $_SESSION['professor']);
                    $fstname = $part[0];
                    echo "Olá, " . $fstname . "!"; 
                ?>
                </span> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link mx-4 " href="../logout.php"><b>Sair</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <?php
        if(isset($_POST['nome'])) {
            $id_aluno = $_POST['id_aluno'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];
            $peso = $_POST['peso'];

            $sql = "UPDATE aluno SET nome = ?, telefone = ?, email = ?, data_nascimento = ?, peso = ? WHERE id_aluno = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssdi", $nome, $telefone, $email, $data_nascimento, $peso, $id_aluno);

            if ($stmt->execute()){
                echo '<div class="container" style="max-width: 30%"> 
                        <div class="alert alert-success text-center" role="alert">                 
                            Informações editadas com sucesso!
                        </div>
                    </div>';
            } else{
                echo'<div class="container" style="max-width: 30%"> 
                        <div class="alert alert-danger text-center" role="alert">                 
                            Erro nas alterações!
                        </div>
                    </div>';
            }

            $stmt->close();
            $conn->close();
        } else {
            echo'<div class="container" style="max-width: 30%"> 
                    <div class="alert alert-danger text-center" role="alert">                 
                        Dados do aluno não foram encontrados!
                    </div>
                </div>'
                ;
        }
        ?>
      <div class="container">
        <div class="d-flex justify-content-center">  
        <a class="btn btn-primary" href="pesquisa.php" role="button">Voltar</a>  
        </div>
      </div>
    </div>
        <!--Codigo JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
