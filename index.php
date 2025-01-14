<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária - Login</title>
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="css/style-tela-login.css">
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <!-- Lado da Imagem -->
        <div class="imagem-carro"></div>

        <!-- Lado do Formulário -->
        <div class="form-login">
            <div class="login">
                <h2>Bem-vindo</h2>
                <form action="validar-login.php" method="POST">
                    <div>
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" required>
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>
                                        <?php
                    if (isset($_SESSION['erro_login'])) {
                        echo '<div class="alert alert-danger mt-3 text-center p-2" role="alert">' . $_SESSION['erro_login'] . '</div>';
                        unset($_SESSION['erro_login']);
                    }
                    ?>
                    <button type="submit" name="submit" class="btn btn-custom">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
