<?php
/* inicio - configuração da conexão com o banco de dados */
$hostName = "us-cdbr-east-04.cleardb.com";
$username = "bba1474053c4ec";
$password = "f659d427";
$database = "heroku_87cadec878d4466";
//heroku
//mysql://bba1474053c4ec:f659d427@us-cdbr-east-04.cleardb.com/heroku_87cadec878d4466?reconnect=true
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