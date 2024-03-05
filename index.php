<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="restrito/estilo.css">


  <title>Fast Ficha</title>
</head>
<body style="color:#FFD700" class="bg-black">

  <nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid bg-black">
      <a class="navbar-brand" href="index.php"><h2 class="rounded">FF</h2></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 5px">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><b>Home</b></a>
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

  <h2 class="container end-50 ">Bem vindo!</h2>

  <div class="container" style="max-width: 700px">
    <div class="position-relative end-50 ms-5">
      <div>
        <div class="border border-danger border-3 rounded p-2 m-3">
          <p class="text-danger">
            <b class="text-danger">ATENÇÃO!</b><br>
            Este projeto tem como propósito ser um exercício de prática em linguagem de programação e não está destinado ao uso no mercado. Não substitui a expertise de um profissional qualificado. Trata-se apenas de um projeto pessoal elaborado para enriquecer meu portfólio.
          </p>
        </div>
        <div class="border border-warning border-3 rounded p-2 m-3"><h3>Como ele funciona?</h3>
          <p>
          O projeto propõe uma abordagem simples, onde o profissional de Educação Física preenche seus dados para criar um ID único e, a partir disso, inicia o cadastro de seus alunos em um banco de dados. Com apenas um clique, o programa gera uma ficha de treino com base nas características do aluno, como peso, altura e experiência de treino. As informações da ficha são armazenadas no banco de dados, visando evitar repetições de exercícios nas próximas fichas. Ao longo do tempo, as fichas se tornam mais completas, com acréscimo de mais exercícios e séries, embora seja inevitável ocorrer alguma repetição. Vale ressaltar que não são consideradas as variações de aparelhos de academia devido à sua extensa diversidade. O código será uma combinação de HTML, CSS, Bootstrap, Mysql, PHP e PHP orientado a objetos, buscando otimização máxima para alcançar um resultado totalmente limpo e eficiente. <br>Utilize o login:"admin" e a senha:"admin" que está tudo configurado e só ver a mágica acontecer. 
          </p>
        </div>
        <div class="border border-warning border-3 rounded p-2 m-3"><h3>Quem sou eu?</h3>
          <p>
          Me chamo Vinicius, tenho 23 anos e estou focado em minha jornada de estudos em programação. Estou em busca de uma oportunidade no mercado de trabalho para poder demonstrar todo o conhecimento que adquiri.<br><br> Possuo um portfólio no GitHub onde detalho minhas experiências e projetos. Agradeço pela oportunidade de apresentar meu potencial e contribuir de maneira significativa.
          </p>  
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
</body>
</html>