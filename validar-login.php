<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){

        include_once('config.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha= '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1){

            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: index.php');

        }else{

            $usuario = $result->fetch_assoc();

            if ($usuario['tipo_usuario'] == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
                header('Location: pagina-adm.php');

            } else if ($usuario['tipo_usuario'] != 1) {

                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
                header('Location: pagina-vendas.php');

            } else {

                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: index.php');
            }
        }

    } else {
        header('Location: index.php');
    }
?>
