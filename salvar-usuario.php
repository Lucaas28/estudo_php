<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $BancoDeDados = new BancoDeDados($conn);

    if (isset($_POST['update'])) {

        $id = $_POST['id_usuarios'];
        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        $usuario = new Usuario($id, $nome, $email, $senha, $tipoDoUsuario, $comissao);

        $BancoDeDados->editarUsuario($usuario);

        $_SESSION['sucess_edit_usuario'] = "Usuário editado com sucesso";

        header('Location: painel-usuarios.php');
        exit();

    } else {
        header('Location: pagina-adm.php');
        exit();
    }