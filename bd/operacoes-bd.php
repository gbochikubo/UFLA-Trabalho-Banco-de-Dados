<?php
    include("./repositorio.php");
    
    $acao = $_GET['action'];
    $repositorio = new Repositorio();

    switch ($acao) {
        case 'INSERT':
            $nome = $_POST["nome"];
            $level = $_POST["level"];
            $raridade = $_POST["raridade"];
            $recompensa = $_POST["recompensa"];
            $detalhes = $_POST["detalhes"];

            $parametros = "?inseriu=";
            if ($repositorio->inserir($nome, $raridade, $level, $recompensa, $detalhes)) {
                $parametros = $parametros . "true";
            } else {
                $parametros = $parametros . "false";
            }
            
            header("Location: /index.php" . $parametros);
            
            break;
        
        case 'UPDATE':
            break;
        
        case 'DELETE':
            break;

        default:
            # code...
            break;
    }

    $repositorio = null;


?>