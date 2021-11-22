<?php
	include_once("../conexao.php");
	
	$id = $_GET['id'];
	
	$result_grupos = "DELETE FROM grupos WHERE idgrupo = '$id'";
	$resultado_grupos = mysqli_query($conn, $result_grupos);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=painel.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=painel.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>