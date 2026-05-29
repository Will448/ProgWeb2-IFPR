<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema da Churrascaria</title>
</head>
<body>



<h1>Sistema da Churrascaria</h1>

<?php


if(isset($_GET['pagamento']) && $_GET['pagamento'] == 'sucesso'){
    echo "<h2 style='color:green'>
            Pagamento registrado com sucesso! O arquivo conta.xml foi gerado.
          </h2>";
}

$cardapio = simplexml_load_file("cardapio.xml");
$vendas = simplexml_load_file("vendas.xml");

if (!$cardapio) {
    die("Erro ao carregar cardapio.xml");
}

if (!$vendas) {
    die("Erro ao carregar vendas.xml");
}

?>

<h2>Cardápio</h2>

<?php foreach ($cardapio->prato as $prato): ?>

    <hr>

    <strong>Código:</strong>
    <?= $prato->codigo ?><br>

    <strong>Prato:</strong>
    <?= $prato->nome ?><br>

    <strong>Descrição:</strong>
    <?= $prato->descricao ?><br>

    <strong>Valor:</strong>
    R$ <?= $prato->valor ?><br>

<?php endforeach; ?>


<h2>Histórico de Vendas</h2>

<?php foreach ($vendas->venda as $venda): ?>

    <hr>

    <strong>Venda:</strong>
    <?= $venda->codigo ?><br>

    <strong>Prato vendido:</strong>
    <?= $venda->prato ?><br>

    <strong>Cliente:</strong>
    <?= $venda->cliente ?><br>

    <strong>Valor pago:</strong>
    R$ <?= $venda->valor ?><br>

<?php endforeach; ?>


<hr>

<h2>Último Pagamento</h2>

<?php if(file_exists("conta.xml")): ?>

    <?php $conta = simplexml_load_file("conta.xml"); ?>

    <hr>

    <strong>Agência:</strong>
    <?= $conta->agencia ?><br>

    <strong>Conta:</strong>
    <?= $conta->conta ?><br>

    <strong>Cliente:</strong>
    <?= $conta->cliente ?><br>

    <strong>Saldo Atual:</strong>
    R$ <?= $conta->saldo_atual ?><br>

    <strong>Última Movimentação:</strong>
    <?= $conta->ultima_movimentacao ?><br>

<?php else: ?>

    <p>Nenhum pagamento registrado.</p>

<?php endif; ?>

<p>
    <a href="pagamento.html">Registrar novo pagamento</a>
</p>


</body>
</html>