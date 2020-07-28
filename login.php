<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>PS Jera</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form class="registerForm" method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" style="color:black" >
		</div>
		<div class="input-group">
			<label>Senha</label>
			<input type="password" name="password" style="color:black">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Entrar</button>
		</div>
		<p>
			Ainda não é um membro? <a href="register.php">Cadastre-se já!</a>
		</p>
	</form>


</body>
</html>