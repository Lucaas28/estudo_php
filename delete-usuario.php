<?php
    session_start();

    if (!isset($_SESSION['email']) || $_SESSION['tipo_usuario'] != 1) {
        header('Location: index.php');
        exit();
    }

    if(!empty($_GET['id_usuarios'])){

        include_once('config.php');

        $id = $_GET['id_usuarios'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id_usuarios = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {

            $sqlDelete = "DELETE FROM usuarios WHERE id_usuarios=$id";
            $resultDelete = $conexao->query($sqlDelete);

        }else{
            header('Location: pagina-adm.php');
        }

    }
    header('Location: usuarios.php');