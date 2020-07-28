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
include_once "api/api_mylist.php";
?>
    <h3>Minha Lista: </h3>
<div class="row_posters">
    <ul class="row_poster">
<?php
    foreach($mylist->items as $results){
	$id 		= $results->id;
	$title 		= $results->title;
	$backdrop 	= $results->backdrop_path;
	if (empty($backdrop) && is_null($backdrop)){
		$backdrop =  dirname($_SERVER['PHP_SELF']).'/img/no-image-found.png';
	} else {
		$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
	}
	echo '<li><a href="movie.php?id=' . $id . '"><img src="'.$backdrop.'"></a> <h4>'.$title.'</h4></li>';
    }
?>
	</ul>
</div>
 <?php
include_once('footer.php');
?>
