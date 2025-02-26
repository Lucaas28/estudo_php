<?php
include_once('config.php');
require_once('VO/Usuario.php');
require_once('VO/Carro.php');

class BancoDeDados
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
};