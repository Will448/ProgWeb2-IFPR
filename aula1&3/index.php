<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>My Travels adm</title>

  <link href="style.css" rel="stylesheet" type="text/css" />

</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>



  <div class="container-form">
    <form class="form-centralizado" method="post" action="home.php">
      <title>Depoimetnos acadêmicos</title>

      <label for="inputAddress" class="form-label" required>Nome</label>
      <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome" required>

      <label for="inputIdade" class="form-label">Idade</label>
      <input type="text" class="form-control" id="inputIdade" name="inputIdade" placeholder="Idade" maxlength="3" required>

      <label for="inputEmail4" class="form-label" required>Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="inputEmail" placeholder="Email" required>

      <label for="inputCurso" class="form-label" required>Curso</label>
      <input type="text" class="form-control" id="inputCurso" name="inputCurso" maxlength="10" placeholder="Curso" required>

      <label for="inputOpiniao" class="form-label">Opinião</label>
      <textarea type="text" class="form-control" id="inputOpiniao" name="inputOpiniao" placeholder="Opinião"></textarea>
      <br />
      <label for="inputAvalicaoCurso" class="form-label"  maxlength="1">Avaliação do curso</label>
      <div class="form-group">
        <input type="number" class="form-control mb-2" name="notaPoo" placeholder="Nota matéria de POO" min="0" max="10" required>
        <input type="number" class="form-control mb-2" name="notaBd" placeholder="Nota matéria de BD" min="0" max="10" required>
        <input type="number" class="form-control mb-2" name="notaIa" placeholder="Nota matéria de IA" min="0" max="10" required>
        <input type="number" class="form-control mb-2" name="notaTcc" placeholder="Nota matéria de TCC" min="0" max="10" required>
        <input type="number" class="form-control mb-2" name="notaEstagio" placeholder="Nota matéria de Estágio" min="0" max="10" required>
</div>
      <br />
      <br />
      <div class="col-12" style="align-items: center; display: flex; justify-content: center;">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-secondary ml-2">Limpar</button>
        <button type="button" class="btn btn-info ml-2" onclick="window.location.href='../index.php'">Voltar para a página inicial</button>
      </div>
    </form>
  </div>

  <style>
    body {
      background-color: #cefcec;
    }

    .container-form {
      display: flex;
      justify-content: center;
      align-items: center;
    }


    .form-centralizado {
      width: 50%;
      max-width: 600px;
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  </style>

</body>

</html>