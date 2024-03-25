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
            "Ombros" => 3,
            "Quadriceps" => 3
        );

        foreach($grupos as $grupo => $limite){
            $sql_ABC = 
               "SELECT exercicios.nome, exerciciosgruposmusculares.grupo_muscular_id, 
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
                    "SELECT seriestreino.series, seriestreino.rep
                    FROM seriestreino  
                    INNER JOIN treinos ON treinos.id_grupo = seriestreino.id
                    INNER JOIN exptreino ON treinos.id_exp_treino = exptreino.id
                    WHERE exptreino.id = '$exp'
                    LIMIT 1;";

                    $sql_series =
                    "SELECT s.series, s.rep
                    FROM seriestreino as s  
                    INNER JOIN grupomusculares as gm ON gm.id = s.id_grupos_musculares
                    INNER JOIN exptreino as et.id = s.id_exp_treino
                    WHERE s.id_grupos_musculares = ".$row['grupo_muscular_id']."
                    LIMIT 1;";

                    $resultado_series = $conn->query($sql_series);
                   

                    while($row_serie = $resultado_series->fetch_assoc()){
                        $rep = $row_serie['rep'];
                        $series = $row_serie['series'];
                        
                        echo "$series x $rep";
                    }
                    echo "</ul>";
                }
            }
        }
    }
    
