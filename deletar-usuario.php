<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $BancoDeDados = new BancoDeDados($conn);

    if (!empty($_GET['id_usuarios'])) {

        $id = $_GET['id_usuarios'];

        $BancoDeDados->deletarUsuario($id);

        $_SESSION['sucess_edit_usuario'] = "Usuário deletado com sucesso";

    }

    header('Location: painel-usuarios.php');