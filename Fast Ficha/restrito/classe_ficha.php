<?php
    require_once 'conexao.php';

    class FichaTreinoGenerator{
        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        public function gerarFichaTreino($id_aluno){
            $fichaTreino = array();

            $sql = "SELECT e.nome AS nome_exercicio, gm.nome AS nome_grupo_muscular FROM exercicios e 
            INNER JOIN exerciciosgruposmusculares egm ON e.id = egm.exercicio_id
            INNER JOIN gruposmusculares gm ON egm.grupo_muscular_id = gm.id";
            $resultado = $this->conn->query($sql);

            if($resultado->num_rows > 0){
                $exercicios = $resultado->fetch_all(MYSQLI_ASSOC);

                foreach($exercicios as $exercicio){
                    $series = rand(1, 5);
                    $repeticoes = rand(8,15);

                    $fichaTreino[] = array(
                        'id' => $id_aluno,
                        'exercicio' => $exercicio,
                        'series' => $series,
                        'repeticoes' => $repeticoes);
                }
            }else {
                echo "Nenhum exercício encontrado no banco de dados.";
            }
            return $fichaTreino;
        }
    }

 