<?php 
    if (!isset($_GET["codigo"])) {
        header("Location: /index.php");
    }

    include("bd/repositorio.php");

    $repo = new Repositorio();

    $monstro = $repo->buscar(is_numeric($_GET["codigo"]) ? $_GET["codigo"] : ((int) $_GET["codigo"]));
    if(count($monstro) == 0) {
        header("Location: /index.php");
    }

    $repo = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Monstro [<?= $monstro["nome"] ?>]</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <header>
        <div class="jumbotron">
            <h1 class="display-4">Modificar registro [<?= $monstro["nome"] ?>]</h1>
            <p class="lead">Preencha corretamente os campos abaixo para adicionar um novo monstro na plataforma.</p>
            <hr class="my-4">
            <p>Plataforma criada por Guilherme Melo, Guilherme Barbosa e Leonardo para disciplina de Banco de Dados, ministrada pelo professor Denilson</p>
        </div>
    </header>

    <main>
        <form method="POST" action="bd/operacoes-bd.php?action=UPDATE&codigo=<?= $monstro["id_monstro"] ?>">
            <div class="form-group">
                <label for="nomeMonstro">Nome do monstro</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <input data-destino="nomeMonstro" type="checkbox" name="checkNome" id="checkNome" >
                        </span>
                    </div>
                    <input readonly id="nomeMonstro" value="<?= $monstro["nome"] ?>" name="nome" class="form-control here" aria-describedby="nomeMonstroHelpBlock" required="required" type="text">
                </div>
                <span id="nomeMonstroHelpBlock" class="form-text text-muted">Digite o nome completo de referência para o monstro</span>
            </div>
            <div class="form-group">
                <label for="raridade">Raridade</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <input data-destino="raridade" type="checkbox" name="checkRaridade" id="checkRaridade">
                    </span>
                </div>
                <input readonly value="<?= $monstro["raridade"] ?>" id="raridade" name="raridade" aria-describedby="raridadeHelpBlock" class="form-control here" required="required" type="number">
                </div>
                <span id="raridadeHelpBlock" class="form-text text-muted">Raridade de aparecimento deste monstro</span>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <input data-destino="level" type="checkbox" name="checkLevel" id="checkLevel">
                    </span>
                </div>
                <input readonly value="<?= $monstro["level"] ?>" id="level" name="level" class="form-control here" aria-describedby="levelHelpBlock" required="required" type="number">
                </div>
                <span id="levelHelpBlock" class="form-text text-muted">Level de dificuldade em abate do monstro</span>
            </div>
            <div class="form-group">
                <label for="recompensa">Recompensa</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <input data-destino="recompensa" type="checkbox" name="checkRecompensa" id="checkRecompensa">
                    </span>
                </div>
                <input readonly value="<?= $monstro["recompensa"] ?>" id="recompensa" name="recompensa" class="form-control here" aria-describedby="recompensaHelpBlock" required="required" type="number">
                </div>
                <span id="recompensaHelpBlock" class="form-text text-muted">Recompensa (em moedas) por abate do monstro</span>
            </div>
            <div class="form-group">
                <label for="detalhes">Detalhes</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <input data-destino="detalhes" type="checkbox" name="checkDetalhes" id="checkDetalhes">
                    </span>
                </div>
                <textarea readonly id="detalhes" name="detalhes" class="form-control here" aria-describedby="detalhesHelpBlock" required="required" type="number"><?= $monstro["detalhes"] ?></textarea>
                </div>
                <span id="detalhesHelpBlock" class="form-text text-muted">Detalhes e história deste monstro específico. Texto livre.</span>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Salvar Registro</button>
            </div>
        </form>
    </main>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/atualizar-monstro.js"></script>
</body>
</html>
