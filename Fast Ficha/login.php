<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="restrito/estilo.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            <a class="nav-link" href="login.php"><b>Login</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro_prof.php"><b>Cadastre-se</b></a>
          </li>
      </div>
    </div>
  </nav>


  <div class="container" >
    <div class="row position-absolute top-50 start-50 translate-middle w-25" style="min-height: 50%">
      <div>
          <h1 class="display-4">Login</h1>
          <form action="login_script.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">Login</label>
              <input type="text" class="form-control bg-dark text-white" name="login" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" class="form-control bg-dark text-white" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
          </form>

          <?php 
            session_start();

            if(isset($_SESSION['error_message'])){?>
            <div class="mt-3">
             <?php echo "<p>" . $_SESSION['error_message'] . "</p>";?>
            </div>
             <?php unset($_SESSION['error_message']);
            }
          ?>

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
</body>
</html>