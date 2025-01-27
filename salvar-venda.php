<?php
    session_start();

    $idUsuario = $_SESSION['id_usuarios'];

    if(isset($_POST['vender'])){

        include_once('config.php');

        $valorVenda = $_POST['valor_venda'];
        $dataVenda = $_POST['dt_venda'];
        $id_carro = $_GET['id_carro'];

        try{

            $sqlUpdate = "UPDATE carros SET valor_venda = :valor_venda,  dt_venda = :dt_venda, vendedor_id = :id_usuarios WHERE id_carro = :id_carro";

            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':valor_venda', $valorVenda, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':dt_venda', $dataVenda, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':id_usuarios', $idUsuario, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':id_carro', $id_carro, PDO::PARAM_INT);
            $stmtUpdate->execute();

            $sqlComissaoSelect = "SELECT comissao FROM usuarios WHERE id_usuarios = :id_usuarios";

            $stmtComissaoSelect = $conn->prepare($sqlComissaoSelect);
            $stmtComissaoSelect->bindParam(':id_usuarios', $idUsuario, PDO::PARAM_INT);
            $stmtComissaoSelect->execute();

            $comissaoUsuario = $stmtComissaoSelect->fetchColumn();
            $valorComissao = $valorVenda * ($comissaoUsuario / 100);

            $sqlComissaoInsert = "INSERT INTO comissoes (valor_comissao, dt_venda, carro_id, usuario_id, status) VALUES (:valor_comissao, :dt_venda, :carro_id, :usuario_id, :status)";

            $stmtComissao = $conn->prepare($sqlComissaoInsert);

            $status = 'pendente';

            $stmtComissao->bindParam(':valor_comissao', $valorComissao, PDO::PARAM_STR);
            $stmtComissao->bindParam(':dt_venda', $dataVenda, PDO::PARAM_STR);
            $stmtComissao->bindParam(':carro_id', $id_carro, PDO::PARAM_INT);
            $stmtComissao->bindParam(':usuario_id', $idUsuario, PDO::PARAM_INT);
            $stmtComissao->bindParam(':status', $status, PDO::PARAM_STR);

            $stmtComissao->execute();

            $_SESSION['sucess_venda_carro'] = "Carro vendido com sucesso! Comissão de R$ <b>$valorComissao</b> adicionada para vendedor $idUsuario";

            }catch(PDOException $e){
                echo "Erro ao buscar dados" . $e->getMessage();
                exit();
            }

        header('Location: carros.php');
        exit();
    }