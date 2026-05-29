<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $agencia = $_POST["agencia"];
    $conta = $_POST["conta"];
    $cliente = $_POST["cliente"];
    $saldo = $_POST["saldo"];
    $movimentacao = $_POST["movimentacao"];

    $xml = new SimpleXMLElement('<conta_bancaria/>');

    $xml->addChild('agencia', $agencia);
    $xml->addChild('conta', $conta);
    $xml->addChild('cliente', $cliente);
    $xml->addChild('saldo_atual', $saldo);
    $xml->addChild('ultima_movimentacao', $movimentacao);

    $xml->asXML('conta.xml');

    header("Location: cardapio.php?pagamento=sucesso");
    exit();
}
?>