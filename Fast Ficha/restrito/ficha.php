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

    <div class="container mt-5 d-flex justify-content-center" style="max-width: 60%">
    <?php 

        $id_aluno = $_SESSION['id_aluno'] ?? null;
        if($id_aluno){

            $sql = "SELECT * FROM aluno where id_aluno = $id_aluno"; 
            $dados = mysqli_query($conn, $sql);

            while($linha = mysqli_fetch_assoc($dados)){
                $id_aluno = $linha['id_aluno'];
                $nome = $linha['nome'];
                $peso = $linha['peso'];
                $altura = $linha['altura'];
                $data_nascimento = $linha ['data_nascimento'];
                $idade = mostra_Idade($data_nascimento);
                $exp_treino = $linha['exp_treino'];
                $imc = calcularImc($linha['peso'], $linha['altura']);
                
                echo "<table class='table table-dark table-striped-columns table-bordered border-white'>
                        <thead>
                            <tr class='text-center'>
                                <th colspan='6'><h3>$nome</h3></th>
                                <tr>
                                    <th colspan='6' class='fw-normal'>
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
                                        }
                                        echo"</div>
                                        </div>
                                        </div>                  
                                    </th>
                                </tr>
                            </tr>
                            <th> </th>
                            <th class='text-center'>Exercicios</th>
                            <th class='text-center' style='width: 6.5%'>Séries</th>
                            <th class='text-center' style='width: 6%'>Rep.</th>
                        </thead>";
                if(isset($_SESSION['resultado_busca'])){
                    $resultado = $_SESSION['resultado_busca'];
                    if(is_array($resultado) && !empty($resultado)){
                        foreach($resultado as $grupo => $exercicios_grupo){
                            $primeiro_exercicio = true;
                            $count_exercicios = count($exercicios_grupo);
                            $grupos_impressos = 0;
                            
                            foreach($exercicios_grupo as $item){                                    
                                $nome_exercicio = $item ["nome"] ?? "";
                                $rep = $item["rep"] ?? "";
                                $series = $item["series"] ?? "";

                                if($primeiro_exercicio){
                                    echo"
                                    <tr>
                                        <div><th class='text-center col align-middle' style='width: 10%' rowspan='$count_exercicios'>$grupo</th></div>";
                                    $grupos_impressos++;    

                                    $primeiro_exercicio = false;
                                }
                                    echo"
                                    <td>$nome_exercicio</td>
                                    <td class='text-center'>$series</td>
                                    <td class='text-center'>$rep</td>";
                                
                                if($count_exercicios > 1){
                                    echo"</tr><tr>";
                                    $count_exercicios--;
                                }                                        
                            }
                            echo"</tr>";
                        }    
                    }              
                }
                 echo"</table>";    
            }
        }
            

    ?>
             
    </div>    
    
</body>
