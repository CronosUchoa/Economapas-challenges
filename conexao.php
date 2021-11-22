<?php
/* inicio - configuração da conexão com o banco de dados */
$hostName = "127.0.0.1";
$username = "gabu";
$password = "123456";
$database = "economapasdb";

$conn = mysqli_connect($hostName, $username, $password, $database);
//verificando a conexão com banco de dados 
// if(!$conn){
// 	die("A conexão ao BD falhou " . mysqli_connect_error());
// }
// else{
// 	echo "conectado ao banco de dados - Mysql !" . "<br>";
// }

/*Fim da configuração da conexão com o banco de dados */ 


?>