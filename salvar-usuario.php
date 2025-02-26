<?php
    require_once('DAO/UsuarioDAO.php');
    include_once('verificar-usuario-adm.php');

    $UsuarioDAO = new UsuarioDAO($conn);

    if (isset($_POST['update'])) {

        $id = $_POST['id_usuarios'];
        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        $usuario = new Usuario($id, $nome, $email, $senha, $tipoDoUsuario, $comissao);

        $UsuarioDAO->editarUsuario($usuario);

        $_SESSION['sucess_edit_usuario'] = "Usuário editado com sucesso";

        header('Location: Views/painel-usuarios.php');
        exit();

    } else {
        header('Location: Views/pagina-adm.php');
        exit();
    }