<?php
    session_start();

    include_once('config.php');

    $logado = $_SESSION['email'];

    if(!empty($_GET['id_carro'])){
        $id = $_GET['id_carro'];

        try{

        $sql = "SELECT * FROM carros WHERE id_carro = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id' , $id, PDO::PARAM_INT);
        $stmt->execute();

        }catch(PDOException $e){
            echo "Erro ao buscar usuários: " . $e->getMessage();
            exit();
        }

    }else{
        header('Location: pagina-adm.php');
        exit();
    }