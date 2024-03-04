<?php 
    session_start();
    require_once 'conexao.php';
    verificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">

  <title>Fast Ficha</title>
</head>
<body style="color:#FFD700" class="bg-black">

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

  <!--Video de fundo. -->
  <div>
    <div id="video-container">
        <video autoplay muted loop id="video-bg" >
            <source src="img\acad_2.mp4" type="video/mp4">
        </video>
    </div>
  </div>

  <div class="container pt-4" style="max-width: 50%">
    <div class="position-relative end-50 ms-5">
      <div class="bg-dark bg-opacity-75 rounded">
        <div class="border border-warning border-3 rounded p-2">
          <p class="text-warning">
            <b>WORKING IN PROGRESS</b><br>
            Este hub central servirá como um espaço dedicado a desenvolvimentos futuros, abrangendo uma variedade de elementos, como índices, gráficos modernos, dicas práticas e uma ampla amostragem de dados. Aqui, planejo explorar e aprimorar continuamente o conteúdo, proporcionando uma experiência dinâmica e informativa.  
          </p>
        </div>
      </div>
    </div>
  </div>

  <!--Rodapé -->
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