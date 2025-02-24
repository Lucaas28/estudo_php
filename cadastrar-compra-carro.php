<?php
    require_once('BancoDeDados.php');
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    $BancoDeDados = new BancoDeDados($conn);

    if (isset($_POST['comprar-carro'])) {

        $nomeDoCarro = $_POST['nome_carro'];
        $marca = $_POST['marca_carro'];
        $observacao = $_POST['observacao'];
        $valorCompra = $_POST['valor_compra'];
        $idComprador = $_POST['comprador_id'];
        $dataCompra = $_POST['dt_compra'];

        $carros = new Carro($idCarro, $nomeDoCarro, $marca, $observacao, $valorCompra, $idComprador, $dataCompra);

        $BancoDeDados->comprarCarro($carros);

        $_SESSION['sucess_compra_carro'] = "Compra do carro <b>$nomeDoCarro</b> foi realizada com sucesso";

        header('Location: Views/painel-carros.php');

    }