<?php
	include_once("../conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['idgrupo']);
	$nome = mysqli_real_escape_string($conn, $_POST['nomeGrupo']);
	$cidades = mysqli_real_escape_string($conn, $_POST['cidades']);
	
	$result_grupos = "UPDATE grupos SET nomeGrupo='$nome', cidades = '$cidades' WHERE idgrupo = '$id'";	
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
					alert(\"Curso alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=painel.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>