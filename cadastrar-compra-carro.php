<?php
    session_start();
    include_once('config.php');

    $logado = $_SESSION['email'];

    if (!isset($_SESSION['email']) || $_SESSION['tipo_usuario'] != 1) {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['comprar-carro'])){

        $nome = $_POST['nome_carro'];
        $marca = $_POST['marca_carro'];
        $observacao = $_POST['observacao'];
        $valorCompra = $_POST['valor_compra'];
        $idComprador = $_POST['comprador_id'];
        $dataCompra = $_POST['dt_compra'];

        $sql = "INSERT INTO carros (nome_carro, marca_carro, observacoes, valor_compra, comprador_id,dt_compra) VALUES ('$nome','$marca','$observacao','$valorCompra','$idComprador','$dataCompra')";

        $result = $conexao->query($sql);
        
    }