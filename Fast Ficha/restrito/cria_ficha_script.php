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
    }



    if($exp = 1){

        $grupos = array(
            "Peito" => 4,
            "Triceps" => 3,
            "Ombros" => 3
        );

        foreach($grupos as $grupo => $limite){
            $sql_ABC = 
               "SELECT exercicios.nome
                FROM exercicios
                JOIN exerciciosgruposmusculares ON exercicios.id = exerciciosgruposmusculares.exercicio_id
                JOIN gruposmusculares ON exerciciosgruposmusculares.grupo_muscular_id = gruposmusculares.id
                WHERE gruposmusculares.nome = '$grupo'
                ORDER BY RAND()
                LIMIT $limite";

            $result_exercicios = $conn->query($sql_ABC);
                        
            if ($result_exercicios->num_rows > 0){
                echo "<h2>$grupo</h2>";

                while($row = $result_exercicios->fetch_assoc()){
                    echo $row["nome"] . "<br>";
                    echo "<ul>";
                    $exercicio = $row["nome"];

//treinos.exp_treino fk de exptreino.id
//treinos.id_grupo fk de seriestreino.id

                    $sql_series =
                       "SELECT seriestreino.rep, seriestreino.series, aluno.exp_treino 
                        FROM seriestreino
                        JOIN exptreino ON seriestreino.exp_treino = exptreino.id
                        JOIN treinos ON exptreino.id = treinos.id_exp_treino
                        JOIN aluno ON exptreino.id = aluno.exp_treino
                        JOIN e
                        WHERE exptreino.id = ? AND aluno.exp_treino = $exp
                        LIMIT 1";

                    $stmt_series = $conn->prepare($sql_series);
                    $stmt_series->bind_param("i", $exp);
                    $stmt_series->execute();
                    $resultado_series = $stmt_series->get_result();
                   

                    while($row_serie = $resultado_series->fetch_assoc()){
                        echo "<li>" . $row_serie["series"] . " x " . $row_serie["rep"] ."</li>";
                    }
                    echo "</ul>";

                    $stmt_series->close();
                }
            }
        }
    }
    
