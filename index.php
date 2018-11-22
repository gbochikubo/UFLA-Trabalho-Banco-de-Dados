<?php
    include("bd/repositorio.php");
    $repositorio = new Repositorio();
    $monstros = $repositorio->buscarTodos();
?>
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

        <?php if (isset($_GET["inseriu"])): ?>
            <?php if ($_GET["inseriu"] == "true"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Tudo certo!</strong> O monstro foi inserido com sucesso na base de dados.
                    <button onclick="AcaoFecharAlerta('inseriu')" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ops!</strong> O monstro não foi adicionado. O erro retornado foi: <?= $_GET["erro"] ?>.
                    <button onclick="AcaoFecharAlerta('inseriu,erro')" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_GET["excluiu"])): ?>
            <?php if ($_GET["excluiu"] == "true"): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Tudo certo!</strong> O monstro foi excluído com sucesso na base de dados.
                    <button onclick="AcaoFecharAlerta('inseriu')" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ops!</strong> O monstro não foi excluído. O erro retornado foi: <?= $_GET["erro"] ?>.
                    <button onclick="AcaoFecharAlerta('inseriu,erro')" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="listagem">
            <h3 class="titulo">
                <span>Listagem de monstros cadastrados</span>
                <a class="btn btn-primary" href="novo-monstro.php" role="button">Novo monstro</a>
            </h3>

            <div class="tabela">
                <?php if (count($monstros)): ?>
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
                            <?php foreach ($monstros as $monstro) { ?>
                                <tr>
                                    <th scope="row"><?= $monstro["id_monstro"] ?></th>
                                    <td><?= $monstro["nome"] ?></td>
                                    <td><?= $monstro["raridade"] ?></td>
                                    <td><?= $monstro["level"] ?></td>
                                    <td><?= $monstro["recompensa"] ?></td>
                                    <td>
                                        <a href="bd/operacoes-bd.php?action=DELETE&codigo=<?= $monstro["id_monstro"] ?>" role="button" class="btn btn-danger btn-sm ">Excluir</a>
                                        <a href="atualizar-monstro.php?codigo=<?= $monstro["id_monstro"] ?>" role="button" class="btn btn-warning btn-sm ">Editar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="footer">
                        <h5>Quantidade de elementos: 13</h5>
                    </div>
                <?php else: ?>
                    <p>Não há elementos cadastrados.</p>
                <?php endif ?>
            </div>
        </div>
    </main>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>