<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];

    if(is_numeric($valor) && is_numeric($quantidade)){

        $valor = (float) $valor;
        $quantidade = (int) $quantidade;

        $total = $valor * $quantidade;

        echo "<h2>Resumo da Compra</h2>";

        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr>
                <th>Produto</th>
                <th>Valor Unitário (R$)</th>
                <th>Quantidade</th>
                <th>Total (R$)</th>
              </tr>";

        echo "<tr>";
        echo "<td>$produto</td>";
        echo "<td>" . number_format($valor, 2, ',', '.') . "</td>";
        echo "<td>$quantidade</td>";
        echo "<td>" . number_format($total, 2, ',', '.') . "</td>";
        echo "</tr>";

        echo "</table>";
        echo "<br><br><button type=\"button\" class=\"btn btn-info ml-2\" onclick=\"window.location.href='../index.php'\">Voltar para a página inicial</button>";
        echo "<br><br><button type=\"button\" class=\"btn btn-secondary ml-2\" onclick=\"window.location.href='produtos.php'\">Registrar nova compra</button>";

    } else {
        echo "<h3 style='color:red;'>Valores inválidos!</h3>";
    }

} else {
    echo "<h2>Nenhum dado recebido!</h2>";
}

?>