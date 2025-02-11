<?php
    require_once('BancoDeDados.php');
    require_once('Usuarios.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);

    if (isset($_POST['create'])) {

        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        $usuarios = new Usuarios($nome, $email, $senha, $tipoDoUsuario, $comissao);

        $BancoDeDados->cadastrarUsuario($usuarios);

        $_SESSION['sucess_cadastro'] = "Usuário cadastrado com sucesso!";
        header('Location: painel-usuarios.php');
        exit();

    }