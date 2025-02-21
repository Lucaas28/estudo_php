<?php

class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $tipoDoUsuario;
    public $comissao;

    public function __construct($id, $nome, $email, $senha, $tipoDoUsuario, $comissao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipoDoUsuario = $tipoDoUsuario;
        $this->comissao = $comissao;
    }
}