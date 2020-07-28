<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>PS Jera</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Cadastre-se!</h2>
	</div>
	<form class="registerForm" method="post" action="register.php">
		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Nome</label>
			<input type="text" name="username" value="<?php echo $username; ?>" style="color:black">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" style="color:black">
		</div>
		<div class="input-group">
			<label>Senha</label>
			<input type="password" name="password_1" style="color:black">
		</div>
		<div class="input-group">
			<label>Confirme a sua senha</label>
			<input type="password" name="password_2" style="color:black">
		</div>
		<div class="input-group">
			<label>Data de Nascimento</label>
			<input type="birthday" name="birthday" value="<?php echo $birthday; ?>" style="color:black">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Registrar</button>
		</div>
		<p>
			Já possui uma conta? <a href="login.php">Entrar!</a>
		</p>
	</form>
</body>
</html>