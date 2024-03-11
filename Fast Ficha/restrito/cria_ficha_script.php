<?php
    require('conexao.php');
    session_start();
    $id_aluno = $_GET['id'] ?? null;

    if ($id_aluno) {

        $sql_exp = "SELECT exp_treino FROM aluno WHERE id_aluno = ?";
        $stmt_exp = $conn->prepare($sql_exp);
        $stmt_exp->bind_param("i",$id_aluno);
        $stmt_exp->execute();
        $result_exp = $stmt_exp->get_result();
        $exp = $result_exp->fetch_assoc()['exp_treino'];
        $stmt_exp->close();

     
        $sql_series = "SELECT seriestreino.grupo_muscular, seriestreino.rep, seriestreino.series, aluno.exp_treino, aluno.id_aluno 
                        FROM seriestreino
                        INNER JOIN exptreino ON seriestreino.exp_treino = exptreino.id
                        INNER JOIN treinos ON exptreino.id_grupo = treinos.id_grupo
                        INNER JOIN aluno ON aluno.id_aluno = treinos.id_aluno
                        WHERE aluno.id_aluno = $id_aluno";

        $stmt_series = $conn->prepare($sql_series);
        $stmt_series->bind_param("i", $id_aluno);
        $stmt_series->execute();
        $resultado_series = $stmt_series->get_result();
        $series = $resultado_series->fetch_all(MYSQLI_ASSOC);
        $stmt_series->close();


        $sql_exercicios = "SELECT e.nome AS nome_exercicio, gm.nome AS nome_grupo_muscular 
                            FROM exercicios e 
                            INNER JOIN exerciciosgruposmusculares egm ON e.id = egm.exercicio_id
                            INNER JOIN gruposmusculares gm ON egm.grupo_muscular_id = gm.id";

        $resultado_exercicios = $conn->query($sql_exercicios);
        $exercicios = $resultado_exercicios->fetch_all(MYSQLI_ASSOC);

        if ($series && $exercicios) {
            echo "<pre>";
            print_r($exercicios);
            echo "</pre>";
        } else {
            echo "Ocorreu um erro ao recuperar os dados.";
        }
    } else {
        echo "ID do aluno não fornecido.";
    }
