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

            $parametros = "?removeu=";

            try {
                $repositorio->inserir($nome, $raridade, $level, $recompensa, $detalhes);
                $parametros = $parametros . "true";
            } catch (PDOException $erro) {
                $parametros = $parametros . "false";
                $parametros = $parametros . "&erro=" . $erro->getMessage();
            }

            header("Location: /index.php" . $parametros);
            
            break;
        
        case 'UPDATE':
            break;
        
        case 'DELETE':
            $codigo = $_GET["codigo"];

            $parametros = "?excluiu=";
            if ($repositorio->remover($codigo)) {
                $parametros = $parametros . "true";
            } else {
                $parametros = $parametros . "false";
            }

            header("Location: /index.php" . $parametros);

            break;

        default:
            # code...
            break;
    }

    $repositorio = null;


?>