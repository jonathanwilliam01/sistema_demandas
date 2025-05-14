<?php

require_once __DIR__ . '/../conexao.php';

$sql_demandas =
"SELECT
  d.id,
  d.titulo,
  e.estagio,
  date_format(d.data_abertura, '%d/%m/20%y') as data_abertura, 
  u.nome as solicitante,
  r.nome as responsavel
  
  from demandas d
  left join estagios e on e.id = d.estagio
  left join usuarios u on u.id = d.solicitante
  left join usuarios r on r.id = d.atendente";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandas</title>
    <link rel="stylesheet" href="style-demandas.css">
</head>
<body>

    <div class="container">

        <div class="menu-lateral">
            <div class="menu">
                <h2 style="margin-top: 7%">Demandas</h2>
                    <button style="width: 80%; margin-top: 15%;">Nova Demanda </button>
                    <ul style="list-style-type: none; margin-top: 5%">
                     <li>Demandas encerradas</li>
                     <li>Relatorios</li>
                    </ul>
            </div>
            <footer> V1.01 </footer>
        </div>

        <div class="container-demandas">
            <div class="pesquisa">
                <div class="itens-pesquisa">
                    <form method="post">
                        <input type="text" name="ref-demandas" placeholder="N° Demanda" style="padding: 5px 5px; background-color: #1e1e1e; border: 1px solid white; border-radius:5px; color:white">
                        <button type="submit" name="pesquisar"> Pesquisar </button>
                    </form>
                </div>
            </div>
            <div class="lista-demandas">
                <?php
                $demandas = mysqli_query($mysqli,$sql_demandas);
                ?>
                <table>
                    <thead>
                        <th>Número</th>
                        <th>Data de abertura</th>
                        <th>Titulo</th>
                        <th>Estagio</th>
                        <th>Solicitante</th>
                        <th>Responsavel</th>
                    </thead>
                    <tbody>
                         <?php
                        while($dados_demandas = $demandas->fetch_assoc()){
                        ?>
                        <td><?php echo $dados_demandas['id']?></td>
                        <td><?php echo $dados_demandas['data_abertura']?></td>
                        <td><?php echo $dados_demandas['titulo']?></td>
                        <td><?php echo $dados_demandas['estagio']?></td>
                        <td><?php echo $dados_demandas['solicitante']?></td>
                        <td><?php echo $dados_demandas['responsavel']?></td>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    
</body>
</html>