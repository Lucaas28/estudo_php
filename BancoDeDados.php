<?php

include_once('config.php');

class BancoDeDados
{
    public function obterUsuario()
    {
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

    public function cadastrarUsuario()
    {
        if (isset($_POST['create'])) {

        $nome = $_POST['nome'];
        $email = strtolower($_POST['email']);
        $senha = $_POST['senha'];
        $tipodoUsuario = $_POST['tipo_usuario'];
        $comissao = $_POST['comissao'];

            try {
                global $conn;

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

            } catch (PDOException $e) {
                echo "Erro ao buscar dados: " . $e->getMessage();
                exit();
            }
        }
    }

    public function obterIdUsuario()
    {
        if (!empty($_GET['id_usuarios'])) {
            $id = $_GET['id_usuarios'];

            try {
                global $conn;

                $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id";

                $stmt = $conn->prepare($sql);
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
                    header('Location: pagina-adm.php');
                    exit();
                }

            } catch (PDOException $e) {
                echo "Erro ao buscar dados: " . $e->getMessage();
                exit();
            }

        } else {
            header('Location: pagina-adm.php');
            exit();
        }
    }

    public function editarUsuario()
    {
        if (isset($_POST['update'])) {

            $id = $_POST['id_usuarios'];
            $nome = $_POST['nome'];
            $email = strtolower($_POST['email']);
            $senha = $_POST['senha'];
            $tipoDoUsuario = $_POST['tipo_usuario'];
            $comissao = $_POST['comissao'];

            try {
                global $conn;

                $sql = "UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, tipo_usuario=:tipo_usuario, comissao=:comissao WHERE id_usuarios=:id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
                $stmt->bindParam(':tipo_usuario', $tipoDoUsuario, PDO::PARAM_INT);
                $stmt->bindParam(':comissao', $comissao, PDO::PARAM_INT);
                $stmt->execute();

                $_SESSION['sucess_edit_usuario'] = "Usuário editado com sucesso";

                header('Location: usuarios.php');
                exit();

            } catch (PDOException $e) {
                echo "Erro ao buscar dados: " . $e->getMessage();
                exit();
            }
        } else {
            header('Location: pagina-adm.php');
            exit();
        }
    }

    public function deletarUsuario()
    {
        if (!empty($_GET['id_usuarios'])) {

            include_once('config.php');

            $id = $_GET['id_usuarios'];

            try {
                global $conn;

                $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $sqlDelete = "DELETE FROM usuarios WHERE id_usuarios = :id";
                    $stmtDelete = $conn->prepare($sqlDelete);
                    $stmtDelete->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmtDelete->execute();

                    $_SESSION['sucess_edit_usuario'] = "Usuário deletado com sucesso";

                } else {
                    header('Location: pagina-adm.php');
                    exit();
                }

            } catch (PDOException $e) {
                echo "Erro ao buscar dados: " . $e->getMessage();
                exit();
            }
        }
        header('Location: usuarios.php');
    }

    public function obterCarro()
    {
        try {
            global $conn;

            $sql = "SELECT * FROM carros";
            $stmt = $conn->query($sql);
            $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $carros;

        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            exit();
        }
    }

    public function comprarCarro()
    {
        if (isset($_POST['comprar-carro'])) {

            $nomeDoCarro = $_POST['nome_carro'];
            $marca = $_POST['marca_carro'];
            $observacao = $_POST['observacao'];
            $valorCompra = $_POST['valor_compra'];
            $idComprador = $_POST['comprador_id'];
            $dataCompra = $_POST['dt_compra'];

            try {
                global $conn;

                $sql = "INSERT INTO carros (nome_carro, marca_carro, observacoes, valor_compra, comprador_id,dt_compra) VALUES (:nome, :marca_carro, :observacao, :valor_compra, :comprador_id, :dt_compra)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nome', $nomeDoCarro, PDO::PARAM_STR);
                $stmt->bindParam(':marca_carro', $marca, PDO::PARAM_STR);
                $stmt->bindParam(':observacao', $observacao, PDO::PARAM_STR);
                $stmt->bindParam(':valor_compra', $valorCompra, PDO::PARAM_STR);
                $stmt->bindParam(':comprador_id', $idComprador, PDO::PARAM_INT);
                $stmt->bindParam(':dt_compra', $dataCompra, PDO::PARAM_STR);
                $stmt->execute();

                $_SESSION['sucess_compra_carro'] = "Compra do carro <b>$nomeDoCarro</b> foi realizada com sucesso";

                header('Location: carros.php');

            } catch (PDOException $e) {
                echo "Erro ao buscar dados" . $e->getMessage();
                exit();
            }
        }
    }

    public function obterIdCarro()
    {
        if (!empty($_GET['id_carro'])) {
            $id = $_GET['id_carro'];

            try {
                global $conn;

                $sql = "SELECT * FROM carros WHERE id_carro = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id' , $id, PDO::PARAM_INT);
                $stmt->execute();

                $carro = $stmt->fetch(PDO::FETCH_ASSOC);
                return $carro;

            } catch (PDOException $e) {
                echo "Erro ao buscar usuários: " . $e->getMessage();
                exit();
            }
        } else {
            header('Location: pagina-adm.php');
            exit();
        }
    }

    public function venderCarro()
    {
        $idUsuario = $_SESSION['id_usuarios'];

        if (isset($_POST['vender'])) {

            include_once('config.php');

            $valorVenda = $_POST['valor_venda'];
            $dataVenda = $_POST['dt_venda'];
            $id_carro = $_GET['id_carro'];

            try {
                global $conn;

                $sqlUpdate = "UPDATE carros SET valor_venda = :valor_venda,  dt_venda = :dt_venda, vendedor_id = :id_usuarios WHERE id_carro = :id_carro";

                $stmtUpdate = $conn->prepare($sqlUpdate);
                $stmtUpdate->bindParam(':valor_venda', $valorVenda, PDO::PARAM_STR);
                $stmtUpdate->bindParam(':dt_venda', $dataVenda, PDO::PARAM_STR);
                $stmtUpdate->bindParam(':id_usuarios', $idUsuario, PDO::PARAM_INT);
                $stmtUpdate->bindParam(':id_carro', $id_carro, PDO::PARAM_INT);
                $stmtUpdate->execute();

                $sqlComissaoSelect = "SELECT comissao FROM usuarios WHERE id_usuarios = :id_usuarios";

                $stmtComissaoSelect = $conn->prepare($sqlComissaoSelect);
                $stmtComissaoSelect->bindParam(':id_usuarios', $idUsuario, PDO::PARAM_INT);
                $stmtComissaoSelect->execute();

                $comissaoUsuario = $stmtComissaoSelect->fetchColumn();
                $valorComissao = $valorVenda * ($comissaoUsuario / 100);

                $status = 'pendente';

                $sqlComissaoInsert = "INSERT INTO comissoes (valor_comissao, dt_venda, carro_id, usuario_id, status) VALUES (:valor_comissao, :dt_venda, :carro_id, :usuario_id, :status)";

                $stmtComissao = $conn->prepare($sqlComissaoInsert);

                $stmtComissao->bindParam(':valor_comissao', $valorComissao, PDO::PARAM_STR);
                $stmtComissao->bindParam(':dt_venda', $dataVenda, PDO::PARAM_STR);
                $stmtComissao->bindParam(':carro_id', $id_carro, PDO::PARAM_INT);
                $stmtComissao->bindParam(':usuario_id', $idUsuario, PDO::PARAM_INT);
                $stmtComissao->bindParam(':status', $status, PDO::PARAM_STR);
                $stmtComissao->execute();

                $_SESSION['sucess_venda_carro'] = "Carro vendido com sucesso! Comissão de R$ <b>$valorComissao</b> adicionada para vendedor $idUsuario";

            } catch (PDOException $e) {
                echo "Erro ao buscar dados" . $e->getMessage();
                exit();
            }
            header('Location: carros.php');
            exit();
        }
    }
};