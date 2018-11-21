<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Monstro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <header>
        <div class="jumbotron">
            <h1 class="display-4">Adicionar um novo Monstro</h1>
            <p class="lead">Preencha corretamente os campos abaixo para adicionar um novo monstro na plataforma.</p>
            <hr class="my-4">
            <p>Plataforma criada por Guilherme Melo, Guilherme Barbosa e Leonardo para disciplina de Banco de Dados, ministrada pelo professor Denilson</p>
        </div>
    </header>

    <main>
        <form method="POST" action="bd/operacoes-bd.php?action=INSERT">
            <div class="form-group">
                <label for="nomeMonstro">Nome do monstro</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-address-card-o"></i>
                        </span>
                    </div>
                    <input id="nomeMonstro" name="nome" class="form-control here" aria-describedby="nomeMonstroHelpBlock" required="required" type="text">
                </div>
                <span id="nomeMonstroHelpBlock" class="form-text text-muted">Digite o nome completo de referência para o monstro</span>
            </div>
            <div class="form-group">
                <label for="raridade">Raridade</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-hourglass-start"></i>
                    </span>
                </div>
                <input id="raridade" name="raridade" aria-describedby="raridadeHelpBlock" class="form-control here" required="required" type="text">
                </div>
                <span id="raridadeHelpBlock" class="form-text text-muted">Raridade de aparecimento deste monstro</span>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-star-half-full"></i>
                    </span>
                </div>
                <input id="level" name="level" class="form-control here" aria-describedby="levelHelpBlock" required="required" type="text">
                </div>
                <span id="levelHelpBlock" class="form-text text-muted">Level de dificuldade em abate do monstro</span>
            </div>
            <div class="form-group">
                <label for="recompensa">Recompensa</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-money"></i>
                    </span>
                </div>
                <input id="recompensa" name="recompensa" class="form-control here" aria-describedby="recompensaHelpBlock" required="required" type="text">
                </div>
                <span id="recompensaHelpBlock" class="form-text text-muted">Recompensa (em moedas) por abate do monstro</span>
            </div>
            <div class="form-group">
                <label for="detalhes">Detalhes</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-book"></i>
                    </span>
                </div>
                <textarea id="detalhes" name="detalhes" class="form-control here" aria-describedby="detalhesHelpBlock" required="required" type="text"></textarea>
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
</body>
</html>
