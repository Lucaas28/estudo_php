<?php
    session_start();
    $idUsuario = $_SESSION['id_usuarios'];

    if(isset($_POST['vender'])){

        include_once('config.php');

        $valorVenda = $_POST['valor_venda'];
        $dataVenda = $_POST['dt_venda'];
        $id = $_GET['id_carro'];

        $sqlUpdate = "UPDATE carros SET valor_venda = '$valorVenda',  dt_venda = '$dataVenda', vendedor_id = '$idUsuario' WHERE id_carro = '$id'";

        $result = $conexao->query($sqlUpdate);

        $sqlComisao = "SELECT comissao FROM usuarios WHERE id_usuarios = '$idUsuario'";

        $resultComissao = $conexao->query($sqlComisao);

        print_r($resultComissao);

        header('Location: carros.php');

    }