<?php

include_once('config.php');

class BancoDeDados{

    public function obterUsuario(){

        try {
            global $conn;

            $sql = "SELECT * FROM usuarios";
            $stmt = $conn->query($sql);
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;

        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            exit();
        }

    }

};