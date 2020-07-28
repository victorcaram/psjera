<?php
//$input=$_GET['search'];
session_start();
include_once "conf/info.php";
include_once "header.php";
include_once "api/api_mylist.php";
?>
    <h3>Minha Lista: </h3>
    <hr>
    <ul>
<?php
    foreach($mylist->items as $results){
	$title 		= $results->title;
	$id 		= $results->id;
	$release	= $results->release_date;
	if (!empty($release) && !is_null($release)){
		$tempyear 	= explode("-", $release);
		$year 		= $tempyear[0];
		if (!is_null($year)){
			$title = $title.' ('.$year.')';
		}
	}
	$backdrop 	= $results->backdrop_path;
	if (empty($backdrop) && is_null($backdrop)){
		$backdrop =  dirname($_SERVER['PHP_SELF']).'/image/no-gambar.jpg';
	} else {
		$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
	}
	echo '<li><a href="movie.php?id=' . $id . '"><img src="'.$backdrop.'"><h4>'.$title.'</h4></a></li>';
    }
?>
    </ul>
 <?php
include_once('footer.php');
?>
