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
            <h2>Sistema de demandas</h2>
        </div>

        <div class="container-demandas">
            <div class="pesquisa">
                <div class="itens-pesquisa">
                    <form method="post">
                        <input type="text" name="ref-demandas" placeholder="N° Demanda">
                        <button type="submit" name="pesquisar"> Pesquisar </button>
                    </form>
                </div>
            </div>
            <div class="lista-demandas">
                <table>
                    <thead>
                        <th>Número</th>
                        <th>Data de abertura</th>
                        <th>Titulo</th>
                        <th>Estagio</th>
                        <th>Responsavel</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>09/05/2025</td>
                        <td>Teste</td>
                        <td>Em atendimento</td>
                        <td>Jonathan</td>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    
</body>
</html>