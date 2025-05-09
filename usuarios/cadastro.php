<?php

require_once __DIR__ . '/../conexao.php';
session_start();

if(isset($_POST['cadastrar'])){
  $nome = $_POST['nome']; 

  $email = $_POST['email'];
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);

  $pass = $_POST['senha'];
  $senha = password_hash($pass, PASSWORD_DEFAULT);

  $cadastrar = "insert into usuarios (nome, email, senha) values ('$nome', '$email', '$senha')";
  $sql_cadastrar = mysqli_query($mysqli, $cadastrar);

  if ($sql_cadastrar) {
    $id = mysqli_insert_id($mysqli); 

    $_SESSION['usuario'] = ['id' => $id, 'nome' => $nome, 'nivel' => 2];

    header("location:index.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="form-container">
    <h2>Criar Conta</h2>

    <form action="" method="post">
      <div class="inputs">
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome" required>
      </div>

      <div class="inputs">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="inputs">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>
      </div>

      <div class="inputs">
        <label for="confirmar">Confirmar senha</label>
        <input type="password" id="confirmar" name="confirmar" required>
      </div>

      <button class="btn" type="submit" name="cadastrar">Cadastrar</button>

    </form>

    <div class="login-link">
      Já tem uma conta? <a href="login.php">Entrar</a>
    </div>
  </div>

</body>
</html>
