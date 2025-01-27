<?php

$dbUser = 'lucas';
$dbSenha = 'Luc@s1995';

try{
    $conn = new PDO ('mysql:host=localhost;dbname=concessionaria', $dbUser, $dbSenha);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

//$dbHost = 'Localhost';
//$dbUser = 'lucas';
//$dbSenha = 'Luc@s1995';
//$dbName = 'concessionaria';

//$conexao = new mysqli($dbHost,$dbUser,$dbSenha,$dbName);

/*
if($conexao->connect_errno){
    echo"Erro";

}else{
    echo"Conectado";
}
*/

?>