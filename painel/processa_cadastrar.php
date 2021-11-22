<?php
		include_once("../conexao.php");
	$nome = mysqli_real_escape_string($conn, $_POST['nomeGrupo']);
	// $detalhes = mysqli_real_escape_string($conn, $_POST['cidadeGrupo']);
	$detalhes = $_POST['cidadeGrupo'];
	$det = implode(",", $detalhes);
	
	
	$result_grupos = "INSERT INTO grupos (nomeGrupo, cidades) VALUES ('$nome','$det')";	
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
					alert(\"Grupo Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=painel.php'>
				<script type=\"text/javascript\">
					alert(\"Grupo não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
			
	</body>
</html>
<?php $conn->close(); ?>