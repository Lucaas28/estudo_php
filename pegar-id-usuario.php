<?php
    require_once('DAO/UsuarioDAO.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $UsuarioDAO = new UsuarioDAO($conn);

    if (!empty($_GET['id_usuarios'])) {
        $id = $_GET['id_usuarios'];

        $user_data = $UsuarioDAO->obterIdUsuario($id);

    } else {
        header('Location: Views/pagina-adm.php');
        exit();
    }