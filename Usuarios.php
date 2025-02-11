<?php
include_once('config.php');
require_once('BancoDeDados.php');

class Usuarios{

    public $nome;
    public $email;
    public $senha;
    public $tipoDoUsuario;
    public $comissao;

    public function __construct($nome, $email, $senha, $tipoDoUsuario, $comissao)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipoDoUsuario = $tipoDoUsuario;
        $this->comissao = $comissao;
    }
}