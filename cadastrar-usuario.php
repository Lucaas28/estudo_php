<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);

    if (isset($_POST['create'])) {

        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        $BancoDeDados->cadastrarUsuario($nome, $email, $senha, $tipoDoUsuario, $comissao);

        $_SESSION['sucess_cadastro'] = "Usuário cadastrado com sucesso!";
        header('Location: usuarios.php');
        exit();

    }