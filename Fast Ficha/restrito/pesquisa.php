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
<body  style="color:#FFD700" class="bg-black">

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

    <!-- Nav de busca -->
    <nav class="navbar navbar-expand-lg navbar-black bg-black">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-end">
                <form class="form" method="POST" role="search" action="pesquisa.php" method="POST">
                    <div class="row">
                        <div class="col-auto">
                            <input class="form-control bg-dark text-white" name="busca" type="search" aria-label="Search">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-success" type="submit">Procurar</button>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </nav> 

    <div class="container mt-5 d-flex justify-content-center" style="max-width: 70%">
        <table class="table table-dark table-striped-columns table-bordered border-white">
             <thead class="text-center">
                <tr>
                    <th colspan="7"><h2>TABELA DE ALUNOS</h2></th>
                </tr>    
                <tr>
                    <th scope="col">Nome</th>                    
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Peso</th>
                    <th scope="col">IMC</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php    
                    $pesquisa = $_POST['busca'] ?? '';       
                    $sql = "SELECT * FROM aluno WHERE nome LIKE '%$pesquisa%' and cod_pessoa like '$_SESSION[cod_pessoa]'";
                    $dados = mysqli_query($conn, $sql);
                
                    while($linha = mysqli_fetch_assoc($dados)) {
                        $id_aluno = $linha['id_aluno'];
                        $nome = $linha['nome'];
                        $telefone = $linha['telefone'];
                        $email = $linha['email'];
                        $data_nascimento = $linha['data_nascimento'];
                        $sexo = $linha['sexo'];
                        $idade = mostra_Idade($data_nascimento);
                        $data_nascimento = mostra_data($data_nascimento);
                        $peso = $linha['peso'];
                        $altura = $linha['altura'];
                        $imc = calcularImc($peso, $altura);
                        $exp_treino = $linha['exp_treino'];
                        
                        echo"<tr> 
                                <th scope='row'>$nome</th>                                
                                <td>$telefone</td>
                                <td>$email</td>
                                <td>$data_nascimento<br>($idade anos)</td>
                                <td>$peso</td>
                                <td>$imc</>
                                <td>
                                    <a href='cadastro_edit.php?id=$id_aluno' class='btn btn-success btn-sm mt-1'>Editar</a>
                                    <button class='btn btn-danger btn-sm mt-1 btn-excluir' data-bs-toggle='modal' data-bs-target='#confirma' data-id='$id_aluno' data-nome='$nome'>Excluir</button>
                                    <a href='ficha.php?id=$id_aluno' class='btn btn-primary btn-sm mt-1'>Fichas</a>
                                </td>
                            </tr>";

                    }
                    ?>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-black">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="excluir_script.php" method="POST">
                    <p>Deseja realmente excluir <b id="nome_pessoa"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                    <input type="hidden" name="id" id="id_aluno" value="">
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                  </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function pegar_dados(id, nome){
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa_1').value = nome;
            document.getElementById('id_aluno').value = id;           
        } 
    </script>
    <script>
        $(document).ready(function(){
            $('.btn-excluir').click(function(){
                var id_aluno = $(this).data('id');
                var nome = $(this).data('nome');
                $('#nome_pessoa').text(nome);
                $('#id_aluno').val(id_aluno);
            });

            $('#confirma-exclusao').click(function(){
                $('#form-excluir').submit();
            });
        });
    </script>

</body>
</html>