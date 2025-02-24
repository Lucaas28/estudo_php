<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'BancoDeDados.php');

class Carro{

    public $idCarro;
    public $nomeDoCarro;
    public $marca;
    public $observacao;
    public $valorCompra;
    public $idComprador;
    public $dataCompra;

    public function __construct($idCarro, $nomeDoCarro, $marca, $observacao, $valorCompra, $idComprador, $dataCompra)
    {
        $this->idCarro = $idCarro;
        $this->nomeDoCarro = $nomeDoCarro;
        $this->marca = $marca;
        $this->observacao =  $observacao;
        $this->valorCompra = $valorCompra;
        $this->idComprador = $idComprador;
        $this->dataCompra = $dataCompra;
    }
}