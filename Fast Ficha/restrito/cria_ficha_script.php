<?php
    require('conexao.php');
    session_start();
    verificarLogin();
    $id_aluno = $_GET['id'] ?? null;

    if ($id_aluno) {
        $_SESSION['id_aluno'] = $id_aluno;
        $sql_exp = "SELECT exp_treino FROM aluno WHERE id_aluno = ?";
        $stmt_exp = $conn->prepare($sql_exp);
        $stmt_exp->bind_param("i",$id_aluno);
        $stmt_exp->execute();
        $result_exp = $stmt_exp->get_result();
        $exp = $result_exp->fetch_assoc()['exp_treino'];
        $stmt_exp->close();
    }

    if($exp == 1){

        $grupos = array(
            array("Peito" , 4),
            array("Triceps", 3),
            array("Ombros", 3),
            array("Quadriceps", 4),
            array("Posterior de coxa", 3),
            array("Panturrilha", 2),
            array("Costas", 4),
            array("Biceps", 3)

        );

        $resultados = array();

        for ($i = 0; $i < 8; $i++){
            $grupo_atual = $grupos[$i][0];
            $limite_atual = $grupos[$i][1];

            $resultado_busca = array();
            
            $sql_ABC = 
            "SELECT exercicios.nome, exerciciosgruposmusculares.id_grupo_muscular
                FROM exercicios
                INNER JOIN exerciciosgruposmusculares ON exercicios.id = exerciciosgruposmusculares.id_exercicio
                INNER JOIN gruposmusculares ON exerciciosgruposmusculares.id_grupo_muscular= gruposmusculares.id
                WHERE gruposmusculares.nome = '$grupo_atual'
                ORDER BY RAND()
                LIMIT $limite_atual";

            $result_exercicios = $conn->query($sql_ABC);
                        
            if ($result_exercicios->num_rows > 0){
                while($row = $result_exercicios->fetch_assoc()){
                    $nome_exercicio = $row["nome"];

                    $sql_series =
                    "SELECT rep, series 
                    FROM seriestreino
                    INNER JOIN aluno ON aluno.exp_treino = seriestreino.id_exp_treino
                    INNER JOIN gruposmusculares ON gruposmusculares.id = seriestreino.id_grupo_muscular
                    WHERE gruposmusculares.nome = '$grupo_atual'
                    LIMIT 1;
                    ";

                    $resultado_series = $conn->query($sql_series);
                    $row_series = $resultado_series->fetch_assoc();
                    $rep = $row_series['rep'];
                    $series = $row_series['series'];

                    $resultado_busca[] = array(
                        "nome" => $nome_exercicio,
                        "rep" => $rep,
                        "series" => $series
                    );
                                       
                }
                $resultados[$grupo_atual] = $resultado_busca;
            }            
        }
        $_SESSION['resultado_busca'] = $resultados;
        header('Location: ficha.php');
    }
    
