<?php
    include_once('config.php');
    include_once('verificar-usuario-adm.php');
    require_once('BancoDeDados.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);
    $usuarios = $BancoDeDados->obterUsuario();
