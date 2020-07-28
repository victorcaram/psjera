<?php
session_start();
$input=$_GET['search'];
$channel=$_GET['channel'];
$search=$input;
include_once "conf/info.php";
$title = 'Result Search | '.$input;
include_once "header.php";
include_once "api/api_search.php";

?>
    <h3>Result Search: <em><?php echo $input?></em></h3>
    <hr>
    <ul>
<?php
	if($channel=="movie"){	
        foreach($search->results as $results){
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
				$backdrop =  dirname($_SERVER['PHP_SELF']).'/img/no-image-found.png';
			} else {
				$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
			}
			echo '<li><a href="movie.php?id=' . $id . '"><img src="'.$backdrop.'"><h4>'.$title.'</h4></a></li>';
		}
    }
?>
    </ul>
 <?php
include_once('footer.php');
?>
