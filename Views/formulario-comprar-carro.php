<?php
    include_once('../cadastrar-compra-carro.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Comprar Carro</title>
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="../css/style-tela-login.css">
    <link rel="stylesheet" href="../css/style-tela-adm.css">
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
                        <a class="nav-link" href="painel-usuarios.php">Gerenciar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="formulario-comprar-carro.php">Comprar Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="painel-carros.php">Gerenciar Carros</a>
                    </li>
                </ul>
                <!-- Texto de boas-vindas e botão "Sair" -->
                <span class="navbar-text me-2">
                    Bem-vindo, <?php echo "<b> $logado </b>"?>
                </span>
                <a href="../sair.php" class="btn btn-sm btn-outline-danger" type="button">Sair</a>
            </div>
        </div>
    </nav>

    <div class="login" style="margin-left: auto; margin-right: auto; margin-top: 50px;">
        <h2>Comprar carro</h2>
        <form class="form-carro" action="../cadastrar-compra-carro.php" method="POST">
            <div>
                <label for="nome_carro" class="form-label">Nome do carro</label>
                <input type="text" class="form-control" name="nome_carro" required>
                <label for="marca_carro" class="form-label">Marca do carro</label>
                <input type="text" class="form-control" name="marca_carro" required>
                <label for="observacoes" class="form-label">Observações <label style="font-size: 11px; color:gray;">(Opcional)</label></label>
                <textarea id="observacao" class="form-control" name="observacao" rows="4" cols="50" placeholder="Digite sua observação aqui..."></textarea>
                <label for="valor_compra" class="form-label">Valor da compra</label>
                <input type="number" class="form-control" name="valor_compra" required>
                <label for="comprador" class="form-label">Comprador</label>
                <input type="text" class="form-control" name="comprador_id" required>
                <label for="data_compra" class="form-label">Data da compra</label>
                <input type="date" class="form-control" name="dt_compra" required>
                <button type="submit" name="comprar-carro" id="comprar-carro" class="btn btn-custom">Efetuar a compra</button>
            </div>
        </form>
    </div>

    <!--<footer>
        <div class="footer-content" style=" background-color: rgb(11, 0, 36); color: white; text-align: center; padding: 11px;">
            <b>Desenvolvido por Lucas</b>
        </div>
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>