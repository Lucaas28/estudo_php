<?php
    session_start();

    require_once('BancoDeDados.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);
    $carro = $BancoDeDados->obterIdCarro();