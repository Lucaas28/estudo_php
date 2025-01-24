<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){

        include_once('config.php');

        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'senha' => $senha,
        ]);

        if($stmt->rowCount() < 1){
            $_SESSION['erro_login'] = "Usuário não encontrado";
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: index.php');
            exit;
        }else{

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario['tipo_usuario'] == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
                $_SESSION['id_usuarios'] = $usuario['id_usuarios'];
                header('Location: pagina-adm.php');
                exit;

            } else if ($usuario['tipo_usuario'] != 1) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
                $_SESSION['id_usuarios'] = $usuario['id_usuarios'];
                header('Location: pagina-vendas.php');
                exit;

            } else {

                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: index.php');
                exit;

            }
        }

    } else {
        header('Location: index.php');
    }
?>
