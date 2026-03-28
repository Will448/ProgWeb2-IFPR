<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['inputNome'];
    $email = $_POST['inputEmail'];
    $opiniao = $_POST['inputOpiniao'];
    $idade = $_POST['inputIdade']; // vem como string
    $curso = $_POST['inputCurso'];

    $notas = [
        $_POST['notaPoo'],
        $_POST['notaBd'],
        $_POST['notaIa'],
        $_POST['notaTcc'],
        $_POST['notaEstagio']
    ];

    echo "<h2>Dados Recebidos!</h2>";
    echo "Seja bem-vindo(a) $nome! <br>";
    echo "Idade: $idade <br>";
    echo "Curso: $curso <br>";
    echo "E-mail cadastrado: $email <br>";
    echo "Opinião: $opiniao <br>";

    echo "<br>Quantidade de caracteres da opinião: " . strlen($opiniao);

    echo "<hr>";
    echo "<h3>Tipos ANTES da conversão:</h3>";

    echo "Nome: " . gettype($nome) . "<br>";
    echo "Email: " . gettype($email) . "<br>";
    echo "Opinião: " . gettype($opiniao) . "<br>";
    echo "Idade: " . gettype($idade) . "<br>";
    echo "Curso: " . gettype($curso) . "<br>";

    echo "<hr>";

    if(is_numeric($idade)){
    $idadeConvertida = (int) $idade;
    //verifica se a idade convertida é um valor plausível
    if($idadeConvertida >= 0 && $idadeConvertida <= 150){
        echo "Idade Convertida para INT: $idadeConvertida <br>";
    } else {
        echo "<span style='color:red;'>Idade inválida!</span><br>";
    }

} else {
    echo "<span style='color:red;'>Idade não é numérica!</span><br>";
}
echo "<hr>";
    echo "<h3>Tipos das NOTAS antes da conversão:</h3>";
//converte para inteiro e exibe o tipo de cada nota
echo"<hr>";
     echo "<pre>";
    print_r($notas);
    echo "</pre>";
echo "<hr>";

    foreach($notas as $i => $nota){
        echo "Nota " . ($i+1) . ": " . gettype($nota) . "<br>";
    }

    $notasConvertidas = [];

    foreach($notas as $nota){
        $notasConvertidas[] = (int) $nota;
    }
    
    $media = array_sum($notasConvertidas) / count($notasConvertidas);

    echo "<hr>";
    echo "<h3>Tabela de Notas</h3>";

    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr>
            <th>Materia</th>
            <th>Nota</th>
            <th>Tipo</th>
        </tr>";
// faz sentido usar um array associativo para exibir o nome da matéria junto com a nota convertida e seu tipo
foreach([ 
    "POO" => $notasConvertidas[0],
    "BD" => $notasConvertidas[1],
    "IA" => $notasConvertidas[2],
    "TCC" => $notasConvertidas[3],
    "Estágio" => $notasConvertidas[4]
] as $materia => $valor){
    echo "<tr>";
    echo "<td>" . $materia . "</td>";
    echo "<td>" . $valor . "</td>";
    echo "<td>" . gettype($valor) . "</td>";
    echo "</tr>";
}
// exibe a média das notas
echo "<tr>";
echo "<td><strong>Média</strong></td>";
echo "<td><strong>" . number_format($media, 2) . "</strong></td>";
echo "<td>-</td>";
echo "</tr>";
    echo "</table>";

} else {
    echo "<h2>Nenhum dado recebido!</h2>";
}

?>