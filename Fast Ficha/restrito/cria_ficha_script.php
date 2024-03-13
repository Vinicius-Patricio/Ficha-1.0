<?php
    require('conexao.php');
    session_start();
    verificarLogin();
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
                        INNER JOIN treinos ON exptreino.id = treinos.id_grupo
                        INNER JOIN aluno ON aluno.exp_treino = treinos.id_exp_treino
                        WHERE aluno.id_aluno = ?";

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

    //     if ($series && $exercicios) {
    //         echo "<pre>";
    //         print_r($exercicios);
    //         print_r($series);            
    //         echo "</pre>";
    //     } else {
    //         echo "Ocorreu um erro ao recuperar os dados.";
    //     }
    // } else {
    //     echo "ID do aluno não fornecido.";
     }

    $aluno = $exp . '-' . $id_aluno;

  switch($exp){
    case 1;

        $sql_ABC = 
        "SELECT 
            gm.nome AS nome_grupo_muscular,
            ge.exercicios_id,
            ge.grupo_muscular_id 
         FROM    
            (SELECT exercicio_id FROM exerciciosgruposmusculares WHERE grupo_muscular_id = 1 ORDER BY RAND () LIMIT 4) AS result_peito,
        JOIN 
            (SELECT exercicio_id FROM exerciciosgruposmusculares WHERE grupo_muscular_id = 7 ORDER BY RAND () LIMIT 3) AS result_triceps ON result_triceps.exercicio_id = result_peito.exercicio_id 
        JOIN    
            (SELECT exercicio_id FROM exerciciosgruposmusculares WHERE grupo_muscular_id = 5 ORDER BY RAND () LIMIT 3) AS result_ombro, ON result_ombro.exercicio_id = result_peito.exercicio_id
        JOIN
            gruposmuscularesexercicio AS ge ON ge.exercicios_id = result_peito.exercicio_id AND ge.grupo_muscular_id IN(1, 7, 5)
        JOIN
            grupomusculares AS gm ON gm.id = ge.grupo_muscular_id;";



        $resultado_exercicios = $conn->query($sql_ABC);
        $exec_ABC = $resultado_exercicios->fetch_all(MYSQLI_ASSOC);
        if ($exec_ABC){
            echo "<pre>";
            print_r($exec_ABC);
            echo "</pre>";
        }




        $sql_series = 
       "SELECT seriestreino.grupo_muscular, seriestreino.rep, seriestreino.series, aluno.exp_treino, aluno.id_aluno 
        FROM seriestreino
        INNER JOIN exptreino ON seriestreino.exp_treino = exptreino.id
        INNER JOIN treinos ON exptreino.id = treinos.id_grupo
        INNER JOIN aluno ON aluno.exp_treino = treinos.id_exp_treino
        WHERE aluno.id_aluno = ?";

        $stmt_series = $conn->prepare($sql_series);
        $stmt_series->bind_param("i", $id_aluno);
        $stmt_series->execute();
        $resultado_series = $stmt_series->get_result();
        $series1 = $resultado_series->fetch_all(MYSQLI_ASSOC);
        $stmt_series->close();



    break;
  }
