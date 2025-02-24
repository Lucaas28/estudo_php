<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);

    if (!empty($_GET['id_usuarios'])) {
        $id = $_GET['id_usuarios'];

        $user_data = $BancoDeDados->obterIdUsuario($id);

    } else {
        header('Location: Views/pagina-adm.php');
        exit();
    }