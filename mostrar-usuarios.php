<?php
    session_start();

    include_once('config.php');
    
    include_once('verificar-usuario-adm.php');

    $logado = $_SESSION['email'];

    try {
        $sql = "SELECT * FROM usuarios";
        $stmt = $conn->query($sql);
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Erro ao buscar usuários: " . $e->getMessage();
        exit();
    }