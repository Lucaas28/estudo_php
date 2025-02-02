<?php
    session_start();

    require_once('BancoDeDados.php');

    $BancoDeDados = new BancoDeDados($conn);
    $BancoDeDados->venderCarro();