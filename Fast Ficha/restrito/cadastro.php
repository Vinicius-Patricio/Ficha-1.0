<?php 
  include 'conexao.php';
  session_start();
  verificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>Cadastro</title>

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
        <span class="d-flex">
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

  <!-- Div do Cadastro -->
  <div class="container" style="padding-top: 50px">
    <div class="row d-flex align-intems-center">
      <div class="col-md-6 mx-auto bg-black bg-opacity-50 p-0 rounded">
        <div class="border border-warning border-3 rounded" style="padding: 20px">
          <form action="cadastro_script.php" method="POST">
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Nome completo:</label>
              <input type="text" class="form-control bg-dark text-white" name="nome" required>        
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">E-mail:</label>
              <input type="email" class="form-control bg-dark text-white" name="email">
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Telefone:</label>
              <input type="text" class="form-control bg-dark text-white" name="telefone" required>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Data Nascimento:</label>
              <input type="date" class="form-control bg-dark text-white" name="data_nascimento" required>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Data de cadastro:</label>
              <input type="date" class="form-control bg-dark text-white" name="data_atual" required>
            </div>
            <div>
              <label for="exampleInputPassword1" class="form-label">Sexo:</label>
              <select class="form-select bg-dark text-white" name="sexo" aria-label="Default select example" required>     
                <option selected>-</option>
                <option value="M">Masc</option>
                <option value="F">Fem</option>
              </select>
            </div>
            <div>
              <label for="exampleInputPassword1" class="form-label">Experiência de Treino:</label>
              <select class="form-select bg-dark text-white" name="exp_treino" aria-label="Default select example" required>     
                <option selected>-</option>
                <option value="1">Iniciante (0 a 6 meses)</option>
                <option value="2">Intermediario (6 meses a 1 ano)</option>
                <option value="3">Avançado (1 a 3 anos)</option>
                <option value="4">Muito avançado (3 anos em diante)</option>
              </select>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Peso:</label>
              <input type="text" class="form-control bg-dark text-white" name="peso" required>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Altura:</label>
              <input type="text" class="form-control bg-dark text-white" name="altura" required>
            </div>
            <button type="submit" style="margin-top: 20px;" class="btn btn-primary">Cadastrar</button>
          </form>
          <?php 
              if (isset($_SESSION['error_message'])) {
                  echo '<div class="alert alert-danger mt-3" role="alert">' . $_SESSION['error_message'] . '</div>';
                  unset($_SESSION['error_message']);
              }
              
              if (isset($_SESSION['success_message'])) {
                  echo '<div class="alert alert-success mt-3" role="alert">' . $_SESSION['success_message'] . '</div>';
                  unset($_SESSION['success_message']);
              }
          ?>
        </div>  
      </div>    
    </div>
  </div>

    <!--Rodapé -->
  <footer class="rodape" style="margin-top: 40px">
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