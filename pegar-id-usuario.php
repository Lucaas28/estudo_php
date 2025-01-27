<?php
    session_start();

    include_once('config.php');

    $logado = $_SESSION['email'];

    include_once('verificar-usuario-adm.php');

    if(!empty($_GET['id_usuarios'])){
        $id = $_GET['id_usuarios'];

        try {

            $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            if($stmt->rowCount() > 0){

            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            $tipoDoUsuario = $user_data['tipo_usuario'];
            $comissao = $user_data['comissao'];

            }else{
                header('Location: pagina-adm.php');
                exit();
            }

        }catch(PDOException $e){
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }

    }else{
        header('Location: pagina-adm.php');
        exit();
    }