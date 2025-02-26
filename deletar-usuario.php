<?php
    require_once('DAO/UsuarioDAO.php');
    include_once('verificar-usuario-adm.php');

    $UsuarioDAO = new UsuarioDAO($conn);

    if (!empty($_GET['id_usuarios'])) {

        $id = $_GET['id_usuarios'];

        $UsuarioDAO->deletarUsuario($id);

        $_SESSION['sucess_edit_usuario'] = "Usuário deletado com sucesso";

    }

    header('Location: Views/painel-usuarios.php');