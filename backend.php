<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("conexao.php");


/* Aqui vou configurar o login */
//evitar acesso direto a pag de login
// if (empty($_POST['nomef']) || empty($_POST['senhaf'])){
//     header('Location: index.php');
//     exit();
// }

if(isset($_POST['nomef']) && isset($_POST['senhaf'])){
    $nome = $_POST['nomef'];
    $senha = $_POST['senhaf'];

    $sql = "select * from usuarios where nome='$nome' and senha='$senha'";
  

    $result = $conn->query($sql);
    $row = mysqli_num_rows($result);
   
    if($row == 1){
           $_SESSION['nomef'] = $nome;
           header('Location: ./painel/painel.php');
           exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
}

// if(isset($_POST['nomef']) ){
//     echo '<div class="alert alert-success">
//     <strong>Success!</strong> Dados salvo com Sucesso !!.
//   </div>' ;

// }
?>