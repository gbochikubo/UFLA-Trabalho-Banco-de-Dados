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
            $dados = array();

            if (isset($_POST["checkNome"]) && $_POST["checkNome"] == "on") {
                $dados["nome"] = $_POST["nome"];
            }

            if (isset($_POST["checkLevel"]) && $_POST["checkLevel"] == "on") {
                $dados["level"] = $_POST["level"];
            } 

            if (isset($_POST["checkDetalhes"]) && $_POST["checkDetalhes"] == "on") {
                $dados["detalhes"] = $_POST["detalhes"];
            }

            if (isset($_POST["checkRecompensa"]) && $_POST["checkRecompensa"] == "on") {
                $dados["recompensa"] = $_POST["recompensa"];
            }

            if (isset($_POST["checkRaridade"]) && $_POST["checkRaridade"] == "on") {
                $dados["raridade"] = $_POST["raridade"];
            }

            $parametros = "?alterou=";
            if ($repositorio->atualizar($_GET["codigo"], $dados)) {
                $parametros = $parametros . "true";
            } else {
                $parametros = $parametros . "false";
            }

            header("Location: /index.php" . $parametros);

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