<?php
    session_start();
    include_once('config.php');

    include_once('verificar-usuario-adm.php');
    $logado = $_SESSION['email'];

    if(isset($_POST['create'])){

        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipodoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

        try{

            $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario, comissao) VALUES (:nome, :email, :senha, :tipo_usuario, :comissao)";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_usuario', $tipodoUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':comissao', $comissao, PDO::PARAM_INT);

            $stmt->execute();

            $_SESSION['sucess_cadastro'] = "Usuário cadastrado com sucesso";

            header('Location: usuarios.php');

        }catch(PDOException $e){
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }
    }
?>