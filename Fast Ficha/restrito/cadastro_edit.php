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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">

  <title>Alteração de Cadastro</title>
</head>

<body class="bg-black" style="color: #FFD700">

  <?php
  $id_aluno = $_GET['id']??'';
  $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";

  $dados = mysqli_query($conn,$sql);
  $linha = mysqli_fetch_assoc($dados);
  
  $imc = calcularImc($linha['peso'], $linha['altura']);

  ?>

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

  <!-- Info Pessoal -->
  <div class="container align-intems-center">
  <form action="edit_script.php" method="POST">
    <div class="container" style="padding-top: 100px">
      <div class="row d-flex align-intems-center">
        <div class="col-md-6 mx-auto bg-black p-0 rounded">
          <div class="border border-warning border-3 rounded" style="padding: 20px">
            <h5>Informações pessoais:</h5>
                <div class="mb-2">
                  <label for="nome" class="form-label"><span>Nome completo:</span></label>
                  <input type="text" name="nome" class="form-control bg-dark text-white" required value="<?php echo $linha['nome'] ?>">
                  <input type="hidden" name="id_aluno" value="<?php echo $id_aluno; ?>">                  
                </div>
                <div class="mb-2">
                  <label for="telefone" class="form-label">Telefone:</label>
                  <input type="text" name="telefone" class="form-control bg-dark text-white" required value="<?php echo $linha['telefone'] ?>">
                </div>
                <div class="mb-2">
                  <label for="nome" class="form-label">Email:</label>
                  <input type="Email" name="email" class="form-control bg-dark text-white" required value="<?php echo $linha['email'] ?>">
                </div>
                <div class="mb-2">
                  <label for="nome" class="form-label">Data de Nascimento:</label>
                  <input type="date" name="data_nascimento" class="form-control bg-dark text-white"  required value="<?php echo $linha['data_nascimento'] ?>">
                </div>
                <div class="mb-2">
                  <label for="nome" class="form-label">Sexo:</label>
                  <input type="text" name="sexo" class="form-control bg-dark text-white" readonly required value="<?php echo $linha['sexo'] ?>">
                </div>
            </div>
          </div>  
        </div>
      </div>

      <!-- Info da ficha -->
      <div class="container mt-1">
        <div class="row d-flex align-intems-center">
          <div class="col-md-6 mx-auto bg-black p-0 rounded">
            <div class="border border-warning border-3 rounded " style="padding: 20px">
              <h5>Informações físicas:</h5>
                <div class="mb-2">
                  <label for="nome" class="form-label"><span>Altura: (cm)</span></label>
                  <input type="text" name="altura" class="form-control bg-dark text-white" readonly required value="<?php echo $linha['altura'] ?>">
                </div>
                <div class="mb-2">
                  <label for="peso" class="form-label">Peso: (kg)</label>
                  <input type="text" name="peso" class="form-control bg-dark text-white" required value="<?php echo $linha['peso'] ?>">
                </div>
                <div class="mb-2">
                  <label for="nome" class="form-label">IMC:</label>
                  <input type="text" name="email" class="form-control bg-dark text-white" disabled required value="<?php echo $imc ?>">
                </div>
                <div class="mb-2">
                  <label for="nome" class="form-label">Exp de Treino:</label>
                  <select class="form-select bg-dark text-white" name="exp_treino" required>
                    <option value="1" <?php if($linha['exp_treino'] == 1) echo 'selected'; ?>>Iniciante (0 a 6 meses)</option>
                    <option value="2" <?php if($linha['exp_treino'] == 2) echo 'selected'; ?>>Intermediário (6 meses a 1 ano)</option>
                    <option value="3" <?php if($linha['exp_treino'] == 3) echo 'selected'; ?>>Avançado (1 a 3 anos)</option>
                    <option value="4" <?php if($linha['exp_treino'] == 4) echo 'selected'; ?>>Muito avançado (3 anos em diante)</option>
                </select>
                </div>

            </div>
          </div>  
        </div>
      </div>
      <div class="container">
        <div class="d-flex justify-content-center">  
          <button type="submit" style="margin-top: 20px" class="btn btn-primary">Salvar Alterações</button>  
        </div>
      </div> 
    </form>
  </div>
  
    <!--Rodapé -->
  <footer class="rodape" style="margin-top: 50px">
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