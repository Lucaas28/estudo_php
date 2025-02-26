<?php
    session_start();

    require_once('DAO/CarroDAO.php');

    $logado = $_SESSION['email'];

    $CarroDAO = new CarroDAO($conn);

    if (!empty($_GET['id_carro'])) {
        $id = $_GET['id_carro'];

        $carro = $CarroDAO->obterIdCarro($id);

        if (!$carro) {
            header('Location: Views/painel-carros.php');
            exit();
        }

    } else {
        header('Location: Views/pagina-adm.php');
        exit();
    }