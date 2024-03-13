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