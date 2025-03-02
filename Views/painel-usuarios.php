<?php
    include_once('../mostrar-usuarios.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Usuários</title>
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="../css/style-tela-adm.css">
    <!-- Link para Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="pagina-adm.php"><b>Concessionária </b><i class="fa-solid fa-car"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="painel-usuarios.php">Gerenciar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario-comprar-carro.php">Comprar Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="painel-carros.php">Gerenciar Carros</a>
                    </li>
                </ul>
                <span class="navbar-text me-2">
                    Bem-vindo, <?php echo "<b>$logado</b>"; ?>
                </span>
                <a href="../sair.php" class="btn btn-sm btn-outline-danger" type="button">Sair</a>
            </div>
        </div>
    </nav>

    <div class="m-5 border">
        <table class="table table-primary table-striped table-hover">
            <h2 class="titulo-h2">TABELA DE USUÁRIOS</h2>
            <?php
                    if (isset($_SESSION['sucess_cadastro'])) {
                        echo '<div class="alert alert-success mt-3 text-center p-2" role="alert">' . $_SESSION['sucess_cadastro'] . '</div>';
                        unset($_SESSION['sucess_cadastro']);
                    }
                    if (isset($_SESSION['sucess_edit_usuario'])) {
                        echo '<div class="alert alert-success mt-3 text-center p-2" role="alert">' . $_SESSION['sucess_edit_usuario'] . '</div>';
                        unset($_SESSION['sucess_edit_usuario']);
                    }
                    if (isset($_SESSION['delet_usuario'])) {
                        echo '<div class="alert alert-success mt-3 text-center p-2" role="alert">' . $_SESSION['delet_usuario'] . '</div>';
                        unset($_SESSION['delet_usuario']);
                    }
                    ?>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Tipo de Usuário</th>
                    <th scope="col">Comissão</th>
                    <th scope="col">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario->id)?></td>
                        <td><?= htmlspecialchars($usuario->nome) ?></td>
                        <td><?= htmlspecialchars($usuario->email) ?></td>
                        <td><?= htmlspecialchars($usuario->senha) ?></td>
                        <td><?= htmlspecialchars($usuario->tipoDoUsuario) ?></td>
                        <td><?= htmlspecialchars($usuario->comissao) . '%' ?></td>
                        <td>
                            <a href="formulario-editar-usuario.php?id_usuarios=<?= $usuario->id ?>">
                                <i class="fa-solid fa-pen" style="font-size: 20px; color:rgb(0, 0, 68);"></i>
                            </a>
                            <a href="../deletar-usuario.php?id_usuarios=<?= $usuario->id ?>">
                                <i class="fa-solid fa-trash" style="font-size: 20px; color:rgb(163, 0, 0); margin-left: 10px;"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <div class="cadastrar-container">
                    <a class="cadastrar" href="formulario-cadastrar-usuario.php">
                        <i class="fas fa-plus"></i> Cadastrar novo usuário
                    </a>
                </div>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
