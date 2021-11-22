<?php

session_start();

//verificar se existe uma session

if (!$_SESSION['nomef']) {
	header('Location: index.php');
	exit();
}


?>
<?php

include_once("../conexao.php");
$result_grupos = "SELECT * FROM grupos";
$resultado_grupos = mysqli_query($conn, $result_grupos);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modal</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/styles-painel.css">
</head>

<body>
	<div id="painel_login">
		<h2 id="painel_login-T">Olá, <?php echo $_SESSION['nomef'] ?></h2>
		<a id="painel_login-B" href="../logout.php" class="button">Sair</a>

	</div>

	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Listar Grupos</h1>
		</div>
		<div class="pull-right">
			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
		</div>
		<!-- Inicio Modal -->
		<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Grupos</h4>
					</div>
					<div class="modal-body">
						<form  id="selectapi" method="POST" action="processa_cadastrar.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nomeGrupo" type="text" class="form-control">
							</div>
							<div class="form-group">
								
								<label for="message-text" class="control-label">Cidades:</label>
									
								<select  name="cidadeGrupo[]" class="form-control">
								<?php
								//vou usar uma api do ibge
								$url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/";
								$ch = curl_init($url);
								//organizando
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

								//não verificar
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
								$result_api = json_decode(curl_exec($ch));

								foreach ($result_api as $res_api) {
								?>
									<?php
									echo "<option>". $res_api->nome . " - " . $res_api->sigla . "</option>"
								?>
								<?php } ?>
								
							</select>
						
								
							
							</div>
							<button type="button" id="addCampo" class="btn btn-success center-block " >+</button>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success  ">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Fim Modal -->

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome dos grupos</th>
							<th>Cidades</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($rows_grupos = mysqli_fetch_assoc($resultado_grupos)) { ?>
							<tr>
								<td><?php echo $rows_grupos['idgrupo']; ?></td>
								<td><?php echo $rows_grupos['nomeGrupo']; ?></td>
								<td>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_grupos['idgrupo']; ?>">Visualizar</button>

									<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_grupos['idgrupo']; ?>" data-whatevernome="<?php echo $rows_grupos['nomeGrupo']; ?>" data-whateverdetalhes="<?php echo $rows_grupos['cidades']; ?>">Editar</button>

									<a href="processa_apagar.php?id=<?php echo $rows_grupos['idgrupo']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
								</td>
							</tr>
							<!-- Inicio Modal -->
							<div class="modal fade" id="myModal<?php echo $rows_grupos['idgrupo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_grupos['nomeGrupo']; ?></h4>
										</div>
										<div class="modal-body">
											<p><?php echo $rows_grupos['nomeGrupo']; ?></p>
											<p><?php echo $rows_grupos['cidades']; ?></p>
										</div>
									</div>
								</div>
							</div>
							<!-- Fim Modal -->
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Grupos</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="processa_alterar.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="recipient-name" class="control-label">Nome:</label>
							<input name="nomeGrupo" type="text" class="form-control" id="recipient-name">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">Cidades:</label>
							<textarea name="cidades" class="form-control" id="detalhes-text"></textarea>
						</div>
						<input name="idgrupo" type="hidden" id="id_grupo">
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Alterar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>





	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('whatever') // Extract info from data-* attributes
			var recipientnomeG = button.data('whatevernome')
			var recipientdetalhes = button.data('whateverdetalhes')
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.modal-title').text('ID do Grupo: ' + recipient)
			modal.find('#id_grupo').val(recipient)
			modal.find('#recipient-name').val(recipientnomeG)
			modal.find('#detalhes-text').val(recipientdetalhes)
		})
		var countt=0;
		$('#addCampo').click(function(){
			if(countt < 5){
				$('#selectapi').append(`<div class="form-group">
								
								<label for="message-text" class="control-label">Cidades:</label>
									
								<select  name="cidadeGrupo[]" class="form-control">
								<?php
								//vou usar uma api do ibge
								$url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/";
								$ch = curl_init($url);
								//organizando
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

								//não verificar
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
								$result_api = json_decode(curl_exec($ch));

								foreach ($result_api as $res_api) {
								?>
									<?php
									echo "<option value='" . $res_api->nome . " - " . $res_api->sigla. "'>". $res_api->nome . " - " . $res_api->sigla . "</option>"
								?>
								<?php } ?>
								
							</select>
						
								
							
							</div>`);
				countt++;
			}
			
		})
	</script>
</body>

</html>