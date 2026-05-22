<?php
session_start();

$mensagem = "";

// Quando o usuário cadastrar login e senha
if (isset($_POST['cadastrar'])) {

    $_SESSION['usuario'] = $_POST['usuario'];

    // Cria a hash da senha digitada
    $_SESSION['senha_hash'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    

    $mensagem = "<p style='color:blue;'>Usuário cadastrado! Faça o login.</p>";
}

// Quando o usuário tentar fazer login
if (isset($_POST['login'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verifica usuário e senha
    if (
        isset($_SESSION['usuario']) &&
        $usuario == $_SESSION['usuario'] &&
        password_verify($senha, $_SESSION['senha_hash'])
    ) {

        $mensagem = "<p style='color:green;'>Login realizado com sucesso!</p>";
        $senha_hash = $_SESSION['senha_hash']; // Exibe a hash da senha cadastrada
        $mensagem .= "<p>Hash da senha cadastrada: <code>$senha_hash</code></p>";

    } else {

        $mensagem = "<p style='color:red;'>Usuário ou senha incorretos!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login com Hash</title>
</head>
<body>

    <h2>Cadastro</h2>

    <form method="POST">

        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit" name="cadastrar">
            Cadastrar
        </button>

    </form>

    <hr>

    <h2>Login</h2>

    <form method="POST">

        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit" name="login">
            Entrar
        </button>

    </form>

    <br>

    <?php echo $mensagem; ?>

</body>
</html>