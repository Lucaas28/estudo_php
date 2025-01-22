<?php
    session_start();
    $idUsuario = $_SESSION['id_usuarios'];

    if(isset($_POST['vender'])){

        include_once('config.php');

        $valorVenda = $_POST['valor_venda'];
        $dataVenda = $_POST['dt_venda'];
        $id_carro = $_GET['id_carro'];

        $sqlUpdate = "UPDATE carros SET valor_venda = '$valorVenda',  dt_venda = '$dataVenda', vendedor_id = '$idUsuario' WHERE id_carro = '$id_carro'";

        $result = $conexao->query($sqlUpdate);

        $sqlComissaoSelect = "SELECT comissao FROM usuarios WHERE id_usuarios = '$idUsuario'";

        $resultComissao = $conexao->query($sqlComissaoSelect);

        $comissaoUsuario = mysqli_fetch_column($resultComissao,0);

        $valorComissao = $valorVenda * ($comissaoUsuario / 100);

        $sqlComissaoInsert = "INSERT INTO comissoes (valor_comissao, dt_venda, carro_id, usuario_id, status) VALUES ('$valorComissao', '$dataVenda', '$id_carro', '$idUsuario', 'pendente')";

        $resultValorComissao = $conexao->query($sqlComissaoInsert);

        header('Location: carros.php');

    }