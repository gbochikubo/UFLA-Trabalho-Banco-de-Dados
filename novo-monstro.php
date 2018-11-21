<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Monstro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
        <form>
            <div class="form-group">
                <label for="nome-monstro">Nome do monstro</label> 
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-address-card-o"></i>
                </div> 
                <input id="nome-monstro" name="nome-monstro" type="text" aria-describedby="nome-monstroHelpBlock" required="required" class="form-control here">
                </div> 
                <span id="nome-monstroHelpBlock" class="form-text text-muted">Digite o nome que será referência a este monstro</span>
            </div>
            <div class="form-group">
                <label for="raridade">Raridade</label> 
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-address-card-o"></i>
                </div> 
                <input id="raridade" name="raridade" type="text" aria-describedby="raridadeHelpBlock" class="form-control here">
                </div> 
                <span id="raridadeHelpBlock" class="form-text text-muted">Raridade de aparecimento deste monstro</span>
            </div>
            <div class="form-group">
                <label for="level">Level</label> 
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-address-card-o"></i>
                </div> 
                <input id="level" name="level" type="text" class="form-control here">
                </div>
            </div> 
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Salvar registro</button>
            </div>
        </form>
    </main>
</body>
</html>