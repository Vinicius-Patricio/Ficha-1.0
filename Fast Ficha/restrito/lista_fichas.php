<?php 
    include("conexao.php");
    session_start();
    verificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">

  <title>Fichas</title>
  
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

    <div class="container mt-5 d-flex justify-content-center" style="max-width: 70%">
        <table class="table table-dark table-striped-columns table-bordered border-white mt-5">
            <tbody class="text-center">
                <?php
                $id_aluno = $_GET['id'];
                echo"<td><a class='btn btn-primary' href='cria_ficha_script.php?id=$id_aluno'>Nova ficha</a></td>"
                ?>
            </tbody>    
        </table>

    </div>    
    
    <footer class="rodape">
        <div class="container">
        <span class="navbar-text">
            © 2024 Desenvolvido por Vinicius
        </span>
        </div>
    </footer>

                    <!--Codigo JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>
