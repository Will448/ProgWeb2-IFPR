<?php
session_start();

$mensagem = "";

// Cadastro
if (isset($_POST['cadastrar'])) {

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['senha_hash'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mensagem = "<div class='sucesso'>Usuário cadastrado com sucesso!</div>";
}

// Login
if (isset($_POST['login'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if (
        isset($_SESSION['usuario']) &&
        $usuario == $_SESSION['usuario'] &&
        password_verify($senha, $_SESSION['senha_hash'])
    ) {

       $senha_hash = $_SESSION['senha_hash'];

        $mensagem = "
        <div class='sucesso'>
            Login realizado com sucesso!<br><br>
            <strong>Hash da senha:</strong><br>
            $senha_hash
        </div>
        ";


    } else {

        $mensagem = "<div class='erro'>Usuário ou senha incorretos!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login com Hash</title>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body{
        background:#f2f2f2;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .container{
        width:800px;
        background:white;
        padding:30px;
        border-radius:12px;
        box-shadow:0 0 10px rgba(0,0,0,0.1);
    }

    .titulo{
        text-align:center;
        margin-bottom:25px;
        color:#333;
    }

    .formularios{
        display:flex;
        gap:30px;
    }

    .card{
        flex:1;
        border:1px solid #ddd;
        padding:20px;
        border-radius:10px;
        background:#fafafa;
    }

    .card h2{
        margin-bottom:20px;
        text-align:center;
        color:#444;
    }

    label{
        display:block;
        margin-bottom:5px;
        color:#555;
    }

    input{
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border:1px solid #ccc;
        border-radius:6px;
    }

    button{
        width:100%;
        padding:10px;
        border:none;
        border-radius:6px;
        background:#007bff;
        color:white;
        font-size:16px;
        cursor:pointer;
    }

    button:hover{
        background:#0056b3;
    }

    .sucesso{
        background:#d4edda;
        color:#155724;
        padding:10px;
        border-radius:6px;
        margin-bottom:20px;
        text-align:center;
    }

    .erro{
        background:#f8d7da;
        color:#721c24;
        padding:10px;
        border-radius:6px;
        margin-bottom:20px;
        text-align:center;
    }

</style>

</head>
<body>

<div class="container">

    <h1 class="titulo">Sistema de Login com Hash</h1>

    <?php echo $mensagem; ?>

    <div class="formularios">

        <!-- Cadastro -->
        <div class="card">

            <h2>Cadastro</h2>

            <form method="POST">

                <label>Usuário</label>
                <input type="text" name="usuario" required>

                <label>Senha</label>
                <input type="password" name="senha" required>

                <button type="submit" name="cadastrar">
                    Cadastrar
                </button>

            </form>

        </div>

        <!-- Login -->
        <div class="card">

            <h2>Login</h2>

            <form method="POST">

                <label>Usuário</label>
                <input type="text" name="usuario" required>

                <label>Senha</label>
                <input type="password" name="senha" required>

                <button type="submit" name="login">
                    Entrar
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>