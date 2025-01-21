<?php
    session_start();

    if (!isset($_SESSION['email']) || $_SESSION['tipo_usuario'] != 1) {
        header('Location: index.php');
        exit();
    }

    include_once('config.php');

    if(isset($_POST['update'])){

        $id = $_POST['id_usuarios'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        $sqlUpdate = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', tipo_usuario='$tipoDoUsuario', comissao='$comissao' WHERE id_usuarios='$id'";

        $result = $conexao->query($sqlUpdate);

        header('Location: usuarios.php');

    } else{
        header('Location: pagina-adm.php');
    }