<?php
    session_start();

    if (!isset($_SESSION['email']) || !isset($_SESSION['senha']) || ($_SESSION['tipo_usuario'] != 1 && $_SESSION['tipo_usuario'] != 2)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
        exit();
    }
    $logado = $_SESSION['email'];
