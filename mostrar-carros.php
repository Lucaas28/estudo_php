<?php
    session_start();
    
    require_once('BancoDeDados.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados();
    $carros = $BancoDeDados->obterCarro();