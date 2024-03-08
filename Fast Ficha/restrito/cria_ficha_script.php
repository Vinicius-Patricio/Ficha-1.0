<?php
include('classe_ficha.php');
session_start();

$gerador = new FichaTreinoGenerator($conn);

$fichaTreino = $gerador->gerarFichaTreino($_GET['id']);

echo"<pre>";
print_r($fichaTreino);
echo"</pre>";