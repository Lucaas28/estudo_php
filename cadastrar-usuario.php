<?php
    require_once('DAO/UsuarioDAO.php');
    require_once('VO/Usuario.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $UsuarioDAO = new UsuarioDAO ($conn);

    if (isset($_POST['create'])) {

        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        $usuarios = new Usuario($id, $nome, $email, $senha, $tipoDoUsuario, $comissao);

        $UsuarioDAO->cadastrarUsuario($usuarios);

        $_SESSION['sucess_cadastro'] = "Usuário cadastrado com sucesso!";
        header('Location: painel-usuarios.php');
        exit();

    }