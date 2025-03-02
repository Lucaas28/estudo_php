<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'VO/Usuario.php');

class UsuarioDAO
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function obterUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->conn->query($sql);
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $usuarios = [];

            foreach ($dados as $dado) {
                $usuarios[] = new Usuario(
                    $dado['id_usuarios'],
                    $dado['nome'],
                    $dado['email'],
                    $dado['senha'],
                    $dado['tipo_usuario'],
                    $dado['comissao']
                );
            }

            return $usuarios;

        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            exit();
        }
    }

    public function cadastrarUsuario(Usuario $usuario)
    {
        try {
            $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario, comissao) VALUES (:nome, :email, :senha, :tipo_usuario, :comissao)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome', $usuario->nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $usuario->email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $usuario->senha, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_usuario', $usuario->tipoDoUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':comissao', $usuario->comissao, PDO::PARAM_INT);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }
    }

    public function obterIdUsuario($id)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            $tipoDoUsuario = $user_data['tipo_usuario'];
            $comissao = $user_data['comissao'];

            return $user_data;

            } else {
                header('Location: Views/pagina-adm.php');
                exit();
            }

        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }
    }

    public function editarUsuario(Usuario $usuario)
    {
        try {
            $sql = "UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, tipo_usuario=:tipo_usuario, comissao=:comissao WHERE id_usuarios=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $usuario->id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $usuario->nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $usuario->email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $usuario->senha, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_usuario', $usuario->tipoDoUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':comissao', $usuario->comissao, PDO::PARAM_INT);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }
    }

    public function deletarUsuario($id)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $sqlDelete = "DELETE FROM usuarios WHERE id_usuarios = :id";
                $stmtDelete = $this->conn->prepare($sqlDelete);
                $stmtDelete->bindParam(':id', $id, PDO::PARAM_INT);
                $stmtDelete->execute();

            } else {
                header('Location: Views/pagina-adm.php');
                exit();
            }

        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
            exit();
        }
    }
};