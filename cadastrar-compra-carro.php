<?php
    session_start();
    include_once('config.php');

    $logado = $_SESSION['email'];

    if (!isset($_SESSION['email']) || $_SESSION['tipo_usuario'] != 1) {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['comprar-carro'])){

        $nomeDoCarro = $_POST['nome_carro'];
        $marca = $_POST['marca_carro'];
        $observacao = $_POST['observacao'];
        $valorCompra = $_POST['valor_compra'];
        $idComprador = $_POST['comprador_id'];
        $dataCompra = $_POST['dt_compra'];

        try{

        $sql = "INSERT INTO carros (nome_carro, marca_carro, observacoes, valor_compra, comprador_id,dt_compra) VALUES (:nome, :marca_carro, :observacao, :valor_compra, :comprador_id, :dt_compra)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nomeDoCarro, PDO::PARAM_STR);
        $stmt->bindParam(':marca_carro', $marca, PDO::PARAM_STR);
        $stmt->bindParam(':observacao', $observacao, PDO::PARAM_STR);
        $stmt->bindParam(':valor_compra', $valorCompra, PDO::PARAM_STR);
        $stmt->bindParam(':comprador_id', $idComprador, PDO::PARAM_INT);
        $stmt->bindParam(':dt_compra', $dataCompra, PDO::PARAM_STR);

        $stmt->execute();

        header('Location: carros.php');

        }catch(PDOException $e){
            echo "Erro ao buscar dados" . $e->getMessage();
            exit();
        }
    }