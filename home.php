<?php

session_start();

//verificar se existe uma session

if(!$_SESSION['nomef']){
    header('Location: index.php');
    exit();
}


?>

<h2>olá, <?php echo $_SESSION['nomef'] ?></h2>
<h2><a href="logout.php" >Sair</a></h2>