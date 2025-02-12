<?php
    session_start();

    require_once('BancoDeDados.php');

    $BancoDeDados = new BancoDeDados($conn);

    $idUsuario = $_SESSION['id_usuarios'];

    if (isset($_POST['vender'])) {

        include_once('config.php');

        $valorVenda = $_POST['valor_venda'];
        $dataVenda = $_POST['dt_venda'];
        $id_carro = $_GET['id_carro'];

        $valorComissao = $BancoDeDados->venderCarro($idUsuario, $valorVenda, $dataVenda, $id_carro);

        $_SESSION['sucess_venda_carro'] = "Carro vendido com sucesso! Comissão de R$ <b>$valorComissao</b> adicionada para vendedor $idUsuario";

        header('Location: painel-carros.php');

    }