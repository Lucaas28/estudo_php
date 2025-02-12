<?php
include_once('config.php');
require_once('BancoDeDados.php');

class Carros{

    public $nomeDoCarro;
    public $marca;
    public $observacao;
    public $valorCompra;
    public $idComprador;
    public $dataCompra;

    public function __construct($nomeDoCarro, $marca,  $observacao, $valorCompra, $idComprador, $dataCompra)
    {
        $this->nomeDoCarro = $nomeDoCarro;
        $this->$marca = $marca;
        $this->observacao =  $observacao;
        $this->valorCompra = $valorCompra;
        $this->idComprador = $idComprador;
        $this->dataCompra = $dataCompra;
    }
}