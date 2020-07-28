<?php 
	include "conf/info.php";
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$birthday = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['list_id'] = "";

	// connect to database
	$db = mysqli_connect('mysql.dcc.ufmg.br', 'victor.caram', '1234zaq', 'victorcaram');

	$query = "CREATE TABLE IF NOT EXISTS `psjera_users` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`email` varchar(255) DEFAULT NULL,
	`password` varchar(255) DEFAULT NULL,
	`name` varchar(255) DEFAULT NULL,
	`birthday` date DEFAULT '1970-01-01',
	PRIMARY KEY (`id`),
	UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	mysqli_query($db, $query);

	$query = "CREATE TABLE IF NOT EXISTS `psjera_lists` (
		`email` varchar(255) DEFAULT NULL,
		`profile` varchar(255) DEFAULT NULL,
		`list_id` varchar(255) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	mysqli_query($db, $query);

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$birthday = mysqli_real_escape_string($db, $_POST['birthday']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Coloque um nome valido."); }
		if (empty($email)) { array_push($errors, "Coloque um email valido."); }
		if (empty($password_1)) { array_push($errors, "Coloque uma senha valida."); }
		if (empty($birthday)) { array_push($errors, "Coloque uma data de nascimento valida. (ex: 1996-04-14)."); }

		if ($password_1 != $password_2) {
			array_push($errors, "As duas senhas sao diferentes!");
		}
		$query = "SELECT email FROM psjera_users WHERE email='$email'";
		$result = mysqli_query($db, $query);

		if(mysqli_num_rows($result) > 0){
			array_push($errors, "Email ja cadastrado!");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO psjera_users (email, password, name, birthday)
			 VALUES ('$email', '$password', '$username', '$birthday');";
			mysqli_query($db, $query);

			include_once "api/api_createlist.php";
			$list_id = $createlist->list_id;
			$query = "INSERT INTO psjera_lists (email, profile, list_id)
			 VALUES ('$email', '$username', '$list_id');";
			mysqli_query($db, $query);
			$_SESSION['list_id'] = $list_id;

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Voce esta logado $username!";
			header('location: index.php');
		}

	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Digite um email valido.");
		}
		if (empty($password)) {
			array_push($errors, "Digite uma senha valida.");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT email, password, name FROM psjera_users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				while($row = $results->fetch_assoc()) {
					$username = $row["name"];
				}

				$query = "SELECT list_id FROM psjera_lists WHERE email='$email' AND profile='$username'";
				$result_list = mysqli_query($db, $query);

				while($row = $result_list->fetch_assoc()) {
					$list_id = $row["list_id"];
				}

				$_SESSION['list_id'] = $list_id;
				$_SESSION['email'] = $email;
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Voce esta logado $username!";
				header('location: index.php');
			}else {
				array_push($errors, "Email ou senha invalidos.");
			}
		}
	}
?>