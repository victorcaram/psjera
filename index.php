<?php 

	include "conf/info.php";

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
	include_once "header.php";
?>

<h1 style="color:white;">Populares no momento </h1>
<div class="row_posters">
    <ul class="row_poster">
      <?php
        include_once "api/api_popularmovies.php";
        foreach($popular->results as $p){
			echo '<li style="margin-right:10px">
			<a href="movie.php?id=' . $p->id . '">
			<img style="max-height:200px;" src="http://image.tmdb.org/t/p/w300'. $p->poster_path . '">
			</a>
			</li>';
		}
      ?>
	</ul>
</div>

<h1 style="color:white;">Melhores filmes </h1>
<div class="row_posters">
    <ul class="row_poster">
      <?php
        include_once "api/api_toprated.php";
        foreach($toprated->results as $p){
		  echo '<li style="margin-right:10px">
		  <a href="movie.php?id=' . $p->id . '">
		  <img style="max-height:200px;" src="http://image.tmdb.org/t/p/w300'. $p->poster_path . '">
		  </a>
		  </li>';
        }
      ?>
	</ul>
</div>

<h1 style="color:white;">Proximos Filmes </h1>
<div class="row_posters">
    <ul class="row_poster">
      <?php
        include_once "api/api_upcoming.php";
        foreach($upcoming->results as $p){
			echo '<li style="margin-right:10px">
			<a href="movie.php?id=' . $p->id . '">
			<img style="max-height:200px;" src="http://image.tmdb.org/t/p/w300'. $p->poster_path . '">
			</a>
			</li>';
		}
      ?>
	</ul>
</div>
		
<?php
  include_once "footer.php";
?>