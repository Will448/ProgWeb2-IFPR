<?php

session_start();

function calcularMedia($notas) {
    return array_sum($notas) / count($notas);
}

function determinarSituacao($media) {

    if ($media >= 7) {
        $_SESSION['classe'] = "aprovado";
        return "Aprovado";

    } elseif ($media >= 5) {
        $_SESSION['classe'] = "recuperacao";
        return "Recuperação";

    } else {
        $_SESSION['classe'] = "reprovado";
        return "Reprovado";
    }
}


$notas = [
    $_POST['nota1'],
    $_POST['nota2'],
    $_POST['nota3'],
    $_POST['nota4']
];

$media = calcularMedia($notas);
$situacao = determinarSituacao($media);

$_SESSION['nome'] = $_POST['nome'];
$_SESSION['curso'] = $_POST['curso'];
$_SESSION['ano'] = $_POST['ano'];
$_SESSION['notas'] = $notas;
$_SESSION['media'] = $media;
$_SESSION['situacao'] = $situacao;

header("Location: index.php");
exit();