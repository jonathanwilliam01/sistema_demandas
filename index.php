<?php

include_once('conexao.php');

session_start();

if(isset($_SESSION['usuario'])){
  $nome = $_SESSION['usuario']['nome'];
}

if(isset($_SESSION['usuario'])){
  $nivel = $_SESSION['usuario']['nivel'];
}

if (!isset($_SESSION['usuario'])) {
  header("Location: usuarios/aviso_login.php");
  exit;
}

if(isset($_POST['logoff'])){
  session_destroy();
  header("Location: usuarios/login.php");
}

if(isset($_POST['cadastrados'])){
  header("Location: usuarios/cadastrados.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" href="usuarios/styles.css">
</head>
<body>

  <div class="form-container">
    <h2>Olá, <?php echo $nome ?></h2>
    <h2>Seja bem vindo!</h2>

    <form method="post">
      <div class="login-link">

      <?php if($nivel == 1){
        echo '<a href="login.php"> <button class="botn" name="cadastrados"> Usarios Cadastrados </button> </a>';
      }?>

      <a href=""> <button class="botn" name="demandas">  Acessar demandas </button> </a>
      <a href="login.php"> <button class="botn" name="logoff">  Fazer logoff </button> </a>

      </div>
    </form>

  </div>

</body>
</html>
