<?php
    include("./repositorio.php");
    
    $acao = $_GET['action'];
    $repositorio = new Repositorio();

    switch ($acao) {
        case 'INSERT':
            # code...
            break;
        
        case 'UPDATE':
            break;
        
        case 'DELETE':
            break;

        default:
            # code...
            break;
    }


?>