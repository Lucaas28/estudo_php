<?php

$dbHost = 'Localhost';
$dbUser = 'lucas';
$dbSenha = 'Luc@s1995';
$dbName = 'concessionaria';

$conexao = new mysqli($dbHost,$dbUser,$dbSenha,$dbName);

/*
if($conexao->connect_errno){
    echo"Erro";

}else{
    echo"Conectado";
}
*/

?>