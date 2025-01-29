<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados();
    $user_data = $BancoDeDados->obterIdUsuario();