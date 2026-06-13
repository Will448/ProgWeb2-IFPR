<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Boletim Digital</title>


    <style>
    body{
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        margin: 30px;
    }

    h1, h2{
        text-align: center;
    }

    form{
        width: 500px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: white;
    }

    input{
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    button{
        width: 100%;
        padding: 10px;
        background-color: #47b30d;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    table{
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
    }

    th{
        background-color: #6b0000;
        color: white;
        padding: 12px;
    }

    td{
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .resultado{
        width: 90%;
        margin: auto;
        text-align: center;
        font-size: 18px;
    }

    .aprovado{
        color: green;
        font-weight: bold;
    }

    .recuperacao{
        color: orange;
        font-weight: bold;
    }

    .reprovado{
        color: red;
        font-weight: bold;
    }
</style>
</head>
<body>

    <h1>Boletim Digital</h1>

    <form action="processar_boletim.php" method="POST">

        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Curso:</label><br>
        <input type="text" name="curso" required><br><br>

        <label>Ano:</label><br>
        <input type="number" name="ano" required><br><br>

        <label>Nota 1:</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota1" required>

        <label>Nota 2:</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota2" required><br><br>

        <label>Nota 3:</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota3" required><br><br>

        <label>Nota 4:</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota4" required><br><br>

        
        <button type="submit">Gerar Boletim</button>
        <br><br>
        <button type="reset">Limpar</button>    
    </form>

    <?php if(isset($_SESSION['media'])): ?>

        <hr>

 <h2>Boletim Escolar</h2>

<table>
    <tr>
        <th>Nome</th>
        <th>Curso</th>
        <th>Ano</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Nota 3</th>
        <th>Nota 4</th>
        <th>Média</th>
        <th>Situação</th>
    </tr>

    <tr>
        <td><?= $_SESSION['nome'] ?></td>
        <td><?= $_SESSION['curso'] ?></td>
        <td><?= $_SESSION['ano'] ?></td>
        <td><?= $_SESSION['notas'][0] ?></td>
        <td><?= $_SESSION['notas'][1] ?></td>
        <td><?= $_SESSION['notas'][2] ?></td>
        <td><?= $_SESSION['notas'][3] ?></td>
        <td><?= number_format($_SESSION['media'], 2) ?></td>
        <td class="<?= $_SESSION['classe'] ?>">
            <?= $_SESSION['situacao'] ?>
        </td>
    </tr>
</table>


        <?php session_destroy(); ?>

    <?php endif; ?>

</body>
</html>