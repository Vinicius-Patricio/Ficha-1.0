<?php 
    include("conexao.php");
    include("cria_ficha.php");
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
    <?php 

        $sql = "SELECT * FROM aluno where id_aluno = $_GET[id]"; 
        $dados = mysqli_query($conn, $sql);

        while($linha = mysqli_fetch_assoc($dados)){
            $id_aluno = $linha['id_aluno'];
            $nome = $linha['nome'];
            $peso = $linha['peso'];
            $altura= $linha['altura'];
            $data_nascimento= $linha ['data_nascimento'];
            $idade = mostra_Idade($data_nascimento);
            $exp_treino = $linha['exp_treino'];
            $imc = calcularImc($linha['peso'], $linha['altura']);
        }

        echo "<table class='table table-dark table-striped-columns table-bordered border-white'>
        <thead>
            <tr class='text-center'>
                <th colspan='7'><h3>$nome</h3></th>
                <tr>
                    <th colspan='7' class='fw-normal'>
                        <div class='container p-0'>
                        <div class='row'>
                        <div class='col-6 col-sm-3'> Idade: $idade anos </div>
                        <div class='w-100'></div>
                        <div class='col-6 col-sm-3'> Altura: $altura cm </div> 
                        <div class='w-100'></div>
                        <div class='col-6 col-sm-3'> Peso: $peso kg </div>
                        <div class='col=6 col-sm-3'> IMC: $imc </div>
                        <div class='col-6 col-sm-3'> Divisão de treino: ";
                        switch ($exp_treino){

                            case 1;
                            echo "ABC";
                            break;

                            case 2;
                            echo"ABCD";
                            break;

                            case 3;
                            echo "ABCDE";
                            break;

                            case 4;
                            echo "ABCDEF";
                            break;
                        }echo"</div>
                        </div>
                        </div>                  
                    </th
                </tr>
            </tr>"?>

            <tr class="text-center">
                <th scope="col">Segunda</th>                    
                <th scope="col">Terça</th>
                <th scope="col">Quarta</th>
                <th scope="col">Quinta</th>
                <th scope="col">Sexta</th>
                <th scope="col">Sábado</th>
                <th scope="col">Domingo</th>
            </tr>
        </thead>
    <?php
        $sql = "SELECT * FROM ficha where id_aluno = $_GET[id]";
        $dados = mysqli_query($conn, $sql);
        

        
        echo"
            <tbody class='text-center'>
                <td>
                    <b></b>
                </td>
                <td></td>            
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
            </tbody>    
            </table>"
    ?>            
    </div>    
    
</body>
