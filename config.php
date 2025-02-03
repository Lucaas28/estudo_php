<?php
    $dbUser = 'root';
    $dbSenha = 'root';

    try {
        $conn = new PDO ('mysql:host=localhost;dbname=concessionaria', $dbUser, $dbSenha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }