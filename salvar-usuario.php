<?php
    session_start();

    if (!isset($_SESSION['email']) || $_SESSION['tipo_usuario'] != 1) {
        header('Location: index.php');
        exit();
    }

    include_once('config.php');

    if(isset($_POST['update'])){

        $id = $_POST['id_usuarios'];
        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipoDoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        try{

            $sql = "UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, tipo_usuario=:tipo_usuario, comissao=:comissao WHERE id_usuarios=:id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_usuario', $tipoDoUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':comissao', $comissao, PDO::PARAM_INT);

            $stmt->execute();

            header('Location: usuarios.php');
            exit();

        }catch(PDOException $e){
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }

    } else{
        header('Location: pagina-adm.php');
        exit();
    }