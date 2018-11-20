<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Cadastros - Monstros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <main>
        <div class="jumbotron">
            <h1 class="display-4">Gerenciador de Monstros</h1>
            <p class="lead">Esse é um gerenciador online feito em PHP, consumindo o banco MySQL para cadastro de monstros na plataforma de RPG.</p>
            <hr class="my-4">
            <p>Plataforma criada por Guilherme Melo, Guilherme Barbosa e Leonardo para disciplina de Banco de Dados, ministrada pelo professor Denilson</p>
        </div>

        <div class="listagem">
            <h1 class="titulo">
                <span>Listagem de monstros cadastrados</span>
                <a class="btn btn-primary" href="novo-monstro.php" role="button">Novo monstro</a>
            </h1>

            <div class="tabela">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do monstro</th>
                            <th scope="col">Raridade</th>
                            <th scope="col">Level</th>
                            <th scope="col">Recompensa (moedas)</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Monstro 1 de teste</td>
                            <td>23</td>
                            <td>150</td>
                            <td>30000</td>
                            <td>
                                <a href="excluir.php?codigo=ID" role="button" class="btn btn-danger btn-sm m-0">Excluir</a>
                                <a href="editar.php?codigo=ID" role="button" class="btn btn-info btn-sm m-0">Editar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="footer">
                    <h5>Quantidade de elementos: 13</h5>
                </div>
            </div>
        </div>
    </main>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>