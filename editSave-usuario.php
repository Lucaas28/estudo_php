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

        $sqlUpdate = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', tipo_usuario='$tipoDoUsuario' WHERE id_usuarios='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: pagina-adm.php');