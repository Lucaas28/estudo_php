<?php

session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['senha']) || $_SESSION['tipo_usuario'] != 1) {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
    exit();
}

$logado = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel administrativo</title>
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="css/style-tela-adm.css">
    <!-- Link para Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Link para o bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Logo ou título da navbar -->
            <a class="navbar-brand text-white" href="pagina-adm.php"><b>Concessionária </b><i class="fa-solid fa-car"></i></a>
            <!-- Botão para navegação responsiva -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Links à esquerda -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Gerenciar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comprar-carro.php">Comprar Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gerenciar Carros</a>
                    </li>
                </ul>
                <!-- Texto de boas-vindas e botão "Sair" -->
                <span class="navbar-text me-2">
                    Bem-vindo, <?php echo "<b> $logado </b>"?>
                </span>
                <a href="sair.php" class="btn btn-sm btn-outline-danger" type="button">Sair</a>
            </div>
        </div>
    </nav>

    <!--<footer>
        <div class="footer-content" style=" background-color: rgb(11, 0, 36); color: white; text-align: center; padding: 11px;">
            <b>Desenvolvido por Lucas</b>
        </div>
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
