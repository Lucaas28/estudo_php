<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'VO/Carro.php');

class CarroDAO
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function obterCarros()
    {
        try {
            $sql = "SELECT * FROM carros";
            $stmt = $this->conn->query($sql);
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $carros = [];

            foreach ($dados as $dado) {
                $carros[] = new Carro(
                    $dado['id_carro'],
                    $dado['nome_carro'],
                    $dado['marca_carro'],
                    $dado['observacoes'],
                    $dado['valor_compra'],
                    $dado['comprador_id'],
                    $dado['dt_compra']
                );
            }

            return $carros;

        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            exit();
        }
    }

    public function comprarCarro(Carro $carro)
    {
        try {
            $sql = "INSERT INTO carros (nome_carro, marca_carro, observacoes, valor_compra, comprador_id,dt_compra) VALUES (:nome, :marca_carro, :observacao, :valor_compra, :comprador_id, :dt_compra)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $carro->nomeDoCarro, PDO::PARAM_STR);
            $stmt->bindParam(':marca_carro', $carro->marca, PDO::PARAM_STR);
            $stmt->bindParam(':observacao', $carro->observacao, PDO::PARAM_STR);
            $stmt->bindParam(':valor_compra', $carro->valorCompra, PDO::PARAM_STR);
            $stmt->bindParam(':comprador_id', $carro->idComprador, PDO::PARAM_INT);
            $stmt->bindParam(':dt_compra', $carro->dataCompra, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao buscar dados" . $e->getMessage();
            exit();
        }
    }

    public function obterIdCarro($id)
    {
        try {
            $sql = "SELECT * FROM carros WHERE id_carro = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id' , $id, PDO::PARAM_INT);
            $stmt->execute();

            $carro = $stmt->fetch(PDO::FETCH_ASSOC);
            return $carro;

        } catch (PDOException $e) {
            echo "Erro ao buscar carro: " . $e->getMessage();
            exit();
        }
    }

    public function venderCarro($idUsuario, $valorVenda, $dataVenda, $id_carro)
    {
        try {
            $sqlUpdate = "UPDATE carros SET valor_venda = :valor_venda,  dt_venda = :dt_venda, vendedor_id = :id_usuarios WHERE id_carro = :id_carro";

            $stmtUpdate = $this->conn->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':valor_venda', $valorVenda, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':dt_venda', $dataVenda, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':id_usuarios', $idUsuario, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':id_carro', $id_carro, PDO::PARAM_INT);
            $stmtUpdate->execute();

            $valorComissao = $this->calculaComissao($idUsuario, $valorVenda, $dataVenda, $id_carro);

            return $valorComissao;

        } catch (PDOException $e) {
            echo "Erro ao buscar dados" . $e->getMessage();
            exit();
        }
    }

    public function calculaComissao($idUsuario, $valorVenda, $dataVenda, $id_carro)
    {
        try {

            $sqlComissaoSelect = "SELECT comissao FROM usuarios WHERE id_usuarios = :id_usuarios";

            $stmtComissaoSelect = $this->conn->prepare($sqlComissaoSelect);
            $stmtComissaoSelect->bindParam(':id_usuarios', $idUsuario, PDO::PARAM_INT);
            $stmtComissaoSelect->execute();

            $comissaoUsuario = $stmtComissaoSelect->fetchColumn();
            $valorComissao = $valorVenda * ($comissaoUsuario / 100);

            $status = 'pendente';

            $sqlComissaoInsert = "INSERT INTO comissoes (valor_comissao, dt_venda, carro_id, usuario_id, status) VALUES (:valor_comissao, :dt_venda, :carro_id, :usuario_id, :status)";

            $stmtComissao = $this->conn->prepare($sqlComissaoInsert);

            $stmtComissao->bindParam(':valor_comissao', $valorComissao, PDO::PARAM_STR);
            $stmtComissao->bindParam(':dt_venda', $dataVenda, PDO::PARAM_STR);
            $stmtComissao->bindParam(':carro_id', $id_carro, PDO::PARAM_INT);
            $stmtComissao->bindParam(':usuario_id', $idUsuario, PDO::PARAM_INT);
            $stmtComissao->bindParam(':status', $status, PDO::PARAM_STR);
            $stmtComissao->execute();

            return $valorComissao;

        } catch (PDOException $e) {
            echo "Erro ao buscar dados" . $e->getMessage();
            exit();
        }
    }
};