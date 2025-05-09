<?php

require_once __DIR__ . '/../conexao.php';

session_start();

if(isset($_SESSION['usuario'])){
  $nome = $_SESSION['usuario']['nome'];
  $nivel = $_SESSION['usuario']['nivel'];
}

if($nivel != 1){
  session_destroy();
  header("Location: aviso_login.php");
}

if (!isset($_SESSION['usuario'])) {
  header("Location: aviso_login.php");
  exit;
}

if(isset($_POST['voltar'])){
  header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Usuarios cadastrados</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
</head>
<body>

<style>
  input {
      padding: 8px 5px;
      border: none;
      background-color: #333;
      color: white;
      border-radius: 5px;
  }

  .save, .back{
    margin-top: 15px;
    padding: 0.75rem;
    background-color: #00bcd4;
    border: none;
    border-radius: 8px;
    color: #000;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .save{
    width: 20%;
  }
  .back{
    width: 30%;
  }
</style>

  <div class="container-cadastrados">
    <h2>Usuarios Cadastrados</h2>

    
    <form method="post">
        <table>
            <thead>
              <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Nivel</th>
                <th></th>
              </tr>
            </thead>
                <?php
                  $sql_usuarios = "select u.id, u.nome, u.email, n.descricao as nivel from usuarios u left join niveis_usuarios n on n.id = u.nivel order by u.id";
                  $sql_usuarios = mysqli_query($mysqli, $sql_usuarios);
                  while($usuarios = $sql_usuarios->fetch_assoc()){
                ?>
            <tbody>
              <tr>
                <td><input type="text" value="<?php echo $usuarios['id'];?>"name="id" style="width: 25px; background-color: #1e1e1e;" readonly></td>
                <td><input type="text" value="<?php echo $usuarios['nome'];?>" name="nome" style="width: 200px;"> </td>
                <td><input type="text" value="<?php echo $usuarios['email'];?>" name="email" style="width: 200px;"></td>
                <td><input type="text" value="<?php echo $usuarios['nivel'];?>" name="nivel" style="width: 100px;"></td>
                <td><button type="submit" name="delete" style="cursor:pointer; border: none; background-color: #1e1e1e"><span class="material-icons" style="font-size: 3ch; color:red; background-color: #1e1e1e; border: none">delete</span></button></td>
              </tr>
            </tbody>
                <?php
                            if(isset($_POST['delete'])){
                              $id = $_POST['id'];
              
                              $delete="delete from usuarios where id = $id";
                              $sqldelete = mysqli_query($mysqli,$delete);
                              header("location: cadastrados.php");
                            }
              
                            if(isset($_POST['salvar'])){
                              $nome = $_POST['nome'];
                              $email = $_POST['email'];
                              $id = $_POST['id'];
                            
                              $update="update usuarios set nome = '$nome', email = '$email' where id = $id";
                              $sqlupdate = mysqli_query($mysqli,$update);
                              header("location: cadastrados.php");
                            }
                  };
                ?>
        </table>
        

        <div class="login-link">
          <button type="submit" class="save" name="salvar">  Salvar </button> 
          <br>
          <a href="index.php"> <button class="back" name="voltar"> Voltar a tela inicial </button> </a>
        </div>
    </form>
  </div>

</body>
</html>
