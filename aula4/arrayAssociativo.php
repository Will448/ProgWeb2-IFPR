<?php
session_start(); // corrigido


if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    echo "<h3 style='text-align:center;'>Sessão encerrando...</h3>";
    echo "<script>
            setTimeout(function(){
                window.location.href = 'formsArray.html';
            }, 2000);
          </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Primeiro contato
    $contato = [ // array associativo
        "nome" => $_POST["inputNome"],
        "telefone" => $_POST["inputTelefone"],
        "email" => $_POST["inputEmail"]
    ];

    // Segundo contato
    $contato1 = [ // array associativo
        "nome" => $_POST["inputNome1"],
        "telefone" => $_POST["inputTelefone1"],
        "email" => $_POST["inputEmail1"]
    ];

    // Salvando na sessão
    $_SESSION["contato"] = $contato; // cria a chave "contato" na sessão e atribui o array associativo $contato a ela pois a sessão é um array superglobal que armazena dados entre requisições, e ao atribuir o array associativo $contato a $_SESSION["contato"], estamos armazenando os dados do contato na sessão para que possam ser acessados posteriormente em outras páginas ou requisições.
    $_SESSION["contato1"] = $contato1; // cria uma sesao para o segundo contato

} else {
    header("Location: formulario.html");
    echo"Não recebi dados nenhum";
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dados do Contato</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>Dados Recebidos</h3>
        </div>

        <div class="card-body">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION["contato"]["nome"]); ?></p>
            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($_SESSION["contato"]["telefone"]); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["contato"]["email"]); ?></p>

            <hr>

            <p><strong>Nome 1:</strong> <?php echo htmlspecialchars($_SESSION["contato1"]["nome"]); ?></p>
            <p><strong>Telefone 1:</strong> <?php echo htmlspecialchars($_SESSION["contato1"]["telefone"]); ?></p>
            <p><strong>Email 1:</strong> <?php echo htmlspecialchars($_SESSION["contato1"]["email"]); ?></p>   

           <div class="text-center">
                <form method="post" style="display:inline;">
                    <button type="submit" name="logout" class="btn btn-primary">Voltar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>