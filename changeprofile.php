<?php
//$input=$_GET['search'];
session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
include_once "conf/info.php";
include_once "header.php";
?>
    <h3>Perfis: </h3>
    <hr>
    <ul>
    <li>teste</li>
    </ul>
 <?php
include_once('footer.php');
?>
