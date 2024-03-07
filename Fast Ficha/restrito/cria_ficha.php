<?php

class FichaTreino{
    public function SearchExerc($grupoMuscular, $quantidade){
        $stmt = $this->conexao->prepare("SELECT nome FROM exercicios WHERE grupo_muscular = ? ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("si", $grupoMuscular, $quantidade);
        $stmt->execute();
        $result = $stmt->get_result();
        $exercicios = [];
        while($linha = $result->mysqli_fetch_assoc()){
            $exercicios[] = $linha['nome'];
        }
        $stmt->close();
        return $exercicios;
    }
}
 