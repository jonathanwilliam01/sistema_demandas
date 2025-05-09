<?php

require_once __DIR__ . '/../conexao.php';
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="form-container">
    <h2>Olá!</h2>
    <h2>Preencha os campos abaixo para realizar seu login</h2>
    <form action="" method="post">

      <div class="inputs">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="inputs">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>
          
          <div class="login-link">
            <a href ="esqueci_senha.php"> Esqueci minha senha. </a>
          </div>
      </div>

      <?php
         if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
         
            $sql = "SELECT id, nome, senha, nivel FROM usuarios WHERE email = '$email'";
            $sql = mysqli_query($mysqli,$sql);
         
          if ($sql->num_rows === 1) {
              $usuario = $sql->fetch_assoc();
         
              if (password_verify($senha, $usuario['senha'])) {
                  $_SESSION['usuario'] = [
                      'id' => $usuario['id'],
                      'nome' => $usuario['nome'],
                      'nivel' => $usuario['nivel']
                  ];
                  header("Location: ../index.php");
                  
                  exit;
              } else {
                echo  "Senha incorreta.";}
              } else {
                echo "Usuarios não encontrado.";}
          }
      ?>

      <button class="btn" type="submit" name="login">Realizar login</button>
    </form>

    <div class="login-link">
      Não possui uma conta? <a href="cadastro.php">Cadastre-se</a>
    </div>
  </div>

</body>
</html>
