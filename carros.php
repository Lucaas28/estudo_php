<?php
    include_once('mostrar-carros.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Carros</title>
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
                <?php if (isset($_SESSION['email']) && $_SESSION['tipo_usuario'] == 1): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Gerenciar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario-comprar-carro.php">Comprar Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="carros.php">Gerenciar Carros</a>
                    </li>
                <?php endif; ?>
                </ul>
                <!-- Texto de boas-vindas e botão "Sair" -->
                <span class="navbar-text me-2">
                    Bem-vindo, <?php echo "<b> $logado </b>"?>
                </span>
                <a href="sair.php" class="btn btn-sm btn-outline-danger" type="button">Sair</a>
            </div>
        </div>
    </nav>

    <div class="m-5 border">
        <table class="table table-sucess table-hover">
            <h2 class="titulo-h2">TABELA DE CARROS</h2>
            <?php
                if (isset($_SESSION['sucess_compra_carro'])) {
                    echo '<div class="alert alert-success mt-3 text-center p-2" role="alert">' . $_SESSION['sucess_compra_carro'] . '</div>';
                    unset($_SESSION['sucess_compra_carro']);
                }
                if (isset($_SESSION['sucess_venda_carro'])) {
                    echo '<div class="alert alert-success mt-3 text-center p-2" role="alert">' . $_SESSION['sucess_venda_carro'] . '</div>';
                    unset($_SESSION['sucess_venda_carro']);
                }
            ?>
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Carro</th>
                <th scope="col">Marca</th>
                <th scope="col">Observação</th>
                <th scope="col">Valor da compra</th>
                <th scope="col">Comprador</th>
                <th scope="col">Data da compra</th>
                <th scope="col"><img class="" src="https://cdn-icons-png.flaticon.com/512/69/69192.png" width="30" alt="" style="margin-left: 20px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $carro):?>
                    <tr>
                        <td><?= htmlspecialchars($carro['id_carro']) ?></td>
                        <td><?= htmlspecialchars($carro['nome_carro']) ?></td>
                        <td><?= htmlspecialchars($carro['marca_carro']) ?></td>
                        <td><?= htmlspecialchars($carro['observacoes']) ?></td>
                        <td><?= 'R$' . htmlspecialchars($carro['valor_compra']) ?></td>
                        <td><?= htmlspecialchars($carro['comprador_id'])?></td>
                        <td><?= htmlspecialchars($carro['dt_compra'])?></td>
                        <td>
                        <a href='formulario-vender-carro.php?id_carro=<?= $carro['id_carro'] ?>' class='btn btn-success' style='font-size: 14px;'>Vender</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (isset($_SESSION['email']) && $_SESSION['tipo_usuario'] == 1): ?>
                <div class="cadastrar-container">
                    <a class="cadastrar" href="formulario-comprar-carro.php"><p>Comprar carro
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                    <path d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z"/>
                    </svg></p>
                    </a>
                </div>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

    <!--<footer>
        <div class="footer-content" style=" background-color: rgb(11, 0, 36); color: white; text-align: center; padding: 11px;">
            <b>Desenvolvido por Lucas</b>
        </div>
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>