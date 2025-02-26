<?php
    include_once('config.php');
    include_once('verificar-usuario-adm.php');
    require_once('DAO/UsuarioDAO.php');

    $logado = $_SESSION['email'];

    $UsuarioDAO = new UsuarioDAO($conn);
    $usuarios = $UsuarioDAO->obterUsuarios();