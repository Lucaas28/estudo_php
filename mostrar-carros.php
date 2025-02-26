<?php
    include_once('verificar-usuario-adm.php');
    require_once('DAO/CarroDAO.php');

    $logado = $_SESSION['email'];

    $CarroDAO = new CarroDAO($conn);
    $carros = $CarroDAO->obterCarros();