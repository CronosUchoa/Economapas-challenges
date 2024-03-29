<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
    <?php 
    session_start();
    include_once('./backend.php');
	include_once("./conexao.php");
	?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>LOGIN</h3>
                <?php
                    if(isset($_SESSION['nao_autenticado'])):
                ?>
                <div class="alert alert-danger">
                    <strong>ERROR: </strong> usuário ou senha inválida.
                </div>
                <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                ?>
			</div>
            
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name='nomef' class="form-control" placeholder="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name='senhaf'class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						 <input type="submit" value="Login" class="btn float-right login_btn"> 
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links" >
					Não possui cadastro ? <a href="#"  onclick="opa()" class="styleLink">Criar agora</a>
				</div>
				<div class="d-flex justify-content-center" >
					<a href="#" onclick="opa()" class="styleLink">Esqueceu sua senha?</a>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
function opa()
{
alert("Funcionalidade em construção !");
}
</script>
</body>
</html>