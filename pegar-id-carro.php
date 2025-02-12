<?php
    session_start();

    require_once('BancoDeDados.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);

    if (!empty($_GET['id_carro'])) {
        $id = $_GET['id_carro'];

        $carro = $BancoDeDados->obterIdCarro($id);

        if (!$carro) {
            header('Location: painel-carros.php');
            exit();
        }

    } else {
        header('Location: pagina-adm.php');
        exit();
    }