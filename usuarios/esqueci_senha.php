<?php

require_once __DIR__ . '/../conexao.php';
session_start();

if(isset($_POST['redefinir'])){

  $email = $_POST['email'];
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);

  $pass = $_POST['senha'];
  $senha = password_hash($pass, PASSWORD_DEFAULT);

  $sql_id = "select id, nome from usuarios where email = '$email'";
  $id = mysqli_query($mysqli, $sql_id);
  $dados = $id ->fetch_assoc();

  $redefinir = "update usuarios set senha = '$senha' where email = '$email'";
  $sql_redefinir = mysqli_query($mysqli, $redefinir);

  if ($sql_redefinir) {

    $_SESSION['usuario'] = ['id' => $dados['id'], 'nome' => $dados['nome']];

    header("location: __DIR__ . /../index.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Redefinir Senha</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="form-container">
    <h2>Redefinição de senha</h2>

    <form action="" method="post">
      <div class="inputs">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="inputs">
        <label for="senha">Nova Senha</label>
        <input type="password" id="senha" name="senha" required>
      </div>

      <div class="inputs">
        <label for="confirmar">Confirmar Nova Senha</label>
        <input type="password" id="confirmar" name="confirmar" required>
      </div>

      <button class="btn" type="submit" name="redefinir">Redefinir senha</button>

    </form>

    <div class="login-link">
        Voltar para a tela de <a href="login.php"> login </a>
    </div>
  </div>

</body>
</html>
