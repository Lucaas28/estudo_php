<?php
    session_start();
    $tipoUsuario = $_SESSION['tipo_usuario'];

    if(isset($_POST['vender'])){
        
        include_once('config.php');

        $valorVenda = $_POST['valor_venda'];
        $dataVenda = $_POST['dt_venda'];

        $sql = "";
        
    }

    