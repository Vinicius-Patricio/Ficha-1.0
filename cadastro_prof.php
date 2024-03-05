<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="restrito/css/bootstrap.min.css" rel="stylesheet">
  <link href="restrito/estilo.css" rel="stylesheet">

  <title>Cadastro</title>

</head>
<body style="color:#FFD700" class="bg-black" >

  <nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid bg-black">
      <a class="navbar-brand" href="index.php"><h2 class="rounded">FF</h2></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 5px">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><b>Login</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro_prof.php"><b>Cadastre-se</b></a>
          </li>
      </div>
    </div>
  </nav>

  <div id="video-container">
       <video autoplay muted loop id="video-bg">
          <source src="restrito\img\acad.mp4" type="video/mp4">
      </video>
  </div>

  <div class="container mb-3" style="padding-top: 100px">
      <div class="row d-flex align-intems-center">
        <div class="col-md-6 mx-auto bg-black bg-opacity-50 rounded">
          <div class="border border-warning border-3 rounded" style="padding: 20px">
            <form action="cadastro_prof_script.php" method="POST">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label"><b>Nome do professor:</b></label>
                <input type="text" class="form-control bg-dark text-white" name="professor">        
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label"><b>Endereço:</b></label>
                <input type="text" class="form-control bg-dark text-white" name="endereco">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label"><b>Telefone:</b></label>
                <input type="text" class="form-control bg-dark text-white" name="telefone">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label"><b>E-mail:</b></label>
                <input type="email" class="form-control bg-dark text-white" name="email">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label"><b>CNPJ:</b></label>
                <input type="text" class="form-control bg-dark text-white" name="cnpj">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label"><b>Login</b></label>
                <input type="text" class="form-control bg-dark text-white" name="login">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label"><b>Senha</b></label>
                <input type="password" class="form-control bg-dark text-white" name="senha">
              </div>
              <div style="padding-top: 12px">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
            <?php 
                session_start();

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

  <footer class="rodape">
    <div class="container">
      <span class="navbar-text">
        © 2024 Desenvolvido por Vinicius
      </span>
    </div>
  </footer>
                                    <!--Codigo JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>