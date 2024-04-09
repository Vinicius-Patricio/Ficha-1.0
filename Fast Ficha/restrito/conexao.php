<?php 
$server = "localhost";
$user = "root";
$pass = "";
$bd = "empresa";

if ($conn = mysqli_connect($server, $user, $pass, $bd)){
   //echo "Conectado";
}else{
    echo "Erro!";
}

function verificarLogin() {
    if (!isset($_SESSION['login'])) {
        header("Location: ../index.php");
        exit();
        }
    }         

function mostra_data($data){
    $d = explode('-', $data);
    $escreve = $d[2] . "/" . $d[1] ."/". $d[0];
    return $escreve;
};

function mostra_Idade($data_nascimento){
    $data_nascimento_obj = new DateTime($data_nascimento);
    $data_atual = new DateTime();
    $dif = $data_atual->diff($data_nascimento_obj);
    $idade = $dif->y;
    return $idade;
}

function calcularImc($peso, $altura){
    $altura_m = $altura / 100;
    $imc = $peso / ($altura_m * $altura_m);
    $imc_1 = number_format($imc, 1);
    return $imc_1; 
}

function valid_cnpj($cnpj){
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    if (strlen($cnpj) !== 14) {
        return false;
    }

    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    $dig1 = calDigVerify(substr($cnpj, 0, 12));
    $dig2 = calDigVerify(substr($cnpj, 0, 12) . $dig1);

    if ($dig1 != $cnpj[12] && $dig2 == $cnpj[13]) {
        return false;
    }

    return true;
}

function calDigVerify($base){
    $mult = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $soma = 0;
    
    for ($i = 0; $i <12; $i++) {
        $soma += $base[$i] * $mult[$i];
    }
    $resto = $soma % 11;
    $digito = ($resto < 2) ? 0: (11 - $resto);

    return $digito;
}

// function divisaoTreino($div_treino, $resultado) {
//     $tam_treino = count($div_treino); // Faz a contagem de quantos divisões serão feitas. Ex:(ABC = 3 Divisões de treino, ABCD = 4 Divisões de treino)
//     $cont_grupos = 0;

//     if (is_array($div_treino) && is_array($resultado)) {

//         $divisao = array_values($div_treino);

//         echo "<tr>";
//         foreach($divisao as $tam_treino){
//             $primeiro_grupo = true;
//             foreach ($div_treino as $treino_div) {
//                 if ($treino_div >= $tam_treino) {
//                     echo "<th class='text-center'>Treino " . chr(65 + $cont_grupos) . "</th>
//                             <th class='text-center'>Exercícios</th>
//                             <th class='text-center' style='width: 6.5%'>Séries</th>
//                             <th class='text-center' style='width: 6%'>Rep.</th>";
//                 }
//             }
        
//             echo "</tr>";

//             $cont_grupos++;
//             foreach ($resultado as $grupo => $exercicios_grupo) {
//                 echo "<tr>"; 
//                 $primeiro_exercicio = true; 
//                 $count_exercicios = count($exercicios_grupo); 


//                 echo "<th class='text-center col align-middle' style='width: 10%' rowspan='$count_exercicios'>$grupo</th>";


//                 foreach ($exercicios_grupo as $item) {
//                     $nome_exercicio = $item['nome'] ?? "";
//                     $rep = $item['rep'] ?? "";
//                     $series = $item['series'] ?? "";


//                     echo "<td>$nome_exercicio</td>
//                         <td class='text-center'>$series</td>
//                         <td class='text-center'>$rep</td>";
//                     echo "</tr>";
//                 }
//             }
            
//         }   
//     }
//     print_r($cont_grupos);
//}







