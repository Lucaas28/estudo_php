<?php
    session_start();
    include_once('config.php');

    $logado = $_SESSION['email'];

    if(!empty($_GET['id_carro'])){
        $id = $_GET['id_carro'];

        try{

        $sql = "SELECT * FROM carros WHERE id_carro = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id' , $id, PDO::PARAM_INT);
        $stmt->execute();

        }catch(PDOException $e){
            echo "Erro ao buscar usuários: " . $e->getMessage();
            exit();
        }

    }else{
        header('Location: pagina-adm.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Vender Carro</title>
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="css/style-tela-login.css">
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
            <a class="navbar-brand text-white" href="carros.php"><i class="fa-solid fa-arrow-left" style="font-size: 28px;"></i></a>
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
                <a href="sair.php" class="btn btn-sm btn-outline-danger" type="button">Sair</a>
            </div>
        </div>
    </nav>

    <div class="login" style="margin-left: auto; margin-right: auto; margin-top: 50px;">
        <h2>Vender Carro</b></h2>
        <form action="salvar-venda.php?id_carro=<?php echo $_GET['id_carro']; ?>" method="POST">
            <div>
                <label for="valor da venda" class="form-label">Valor da venda</label>
                <input type="number" class="form-control" name="valor_venda" required>
                <label for="data da venda" class="form-label">Data da venda</label>
                <input type="date" class="form-control" name="dt_venda"required>
                <button type="submit" name="vender" id="vender" class="btn btn-custom">Vender carro</button>
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