<?php
    include_once('../pegar-id-usuario.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Editar Usuário</title>
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
            <a class="navbar-brand text-white" href="painel-usuarios.php"><i class="fa-solid fa-arrow-left" style="font-size: 28px;"></i></a>
            <!-- Botão para navegação responsiva -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
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
        <h2>Editar usuário <b><?php echo $user_data['nome'] ?></b></h2>
        <form action="../salvar-usuario.php" method="POST">
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $user_data['nome'] ?>" required>
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user_data['email'] ?>" required>
                <label for="senha" class="form-label">Senha</label>
                <input type="text" class="form-control" name="senha" value="<?php echo $user_data['senha'] ?>" required>
                <label for="tipo_usuario" class="form-label">Tipo Usuário</label>
                <input type="text" class="form-control" name="tipo_usuario" value="<?php echo $user_data['tipo_usuario'] ?>" required>
                <label for="comissao" class="form-label">Comissão</label>
                <input type="number" class="form-control" name="comissao" value="<?php echo $user_data['comissao'] ?>" required>
                <input type="hidden" name="id_usuarios" value="<?php echo $user_data['id_usuarios'] ?>">
                <button type="submit" name="update" id="update" class="btn btn-custom">Editar</button>
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