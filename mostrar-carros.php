<?php
    session_start();
    
    include_once('config.php');

    $logado = $_SESSION['email'];

    try {
        $sql = "SELECT * FROM carros";
        $stmt = $conn->query($sql);
        $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Erro ao buscar usuários: " . $e->getMessage();
        exit();
    }
