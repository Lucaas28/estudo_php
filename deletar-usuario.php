<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $BancoDeDados = new BancoDeDados($conn);
    $BancoDeDados->deletarUsuario();