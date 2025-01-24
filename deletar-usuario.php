<?php
    session_start();

    if (!isset($_SESSION['email']) || $_SESSION['tipo_usuario'] != 1) {
        header('Location: index.php');
        exit();
    }

    if(!empty($_GET['id_usuarios'])){

        include_once('config.php');

        $id = $_GET['id_usuarios'];

        try{

            $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                $sqlDelete = "DELETE FROM usuarios WHERE id_usuarios = :id";

                $stmtDelete = $conn->prepare($sqlDelete);

                $stmtDelete->bindParam(':id', $id, PDO::PARAM_INT);

                $stmtDelete->execute();

            }else{
                header('Location: pagina-adm.php');
                exit();
            }

        }catch(PDOException $e){
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }
    }
    header('Location: usuarios.php');
