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
<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success'];
						//$pieces = explode(' ', $_SESSION['success']);
						//$email = array_pop($pieces);
						//echo "<h1>".$email."</h1>";
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

<h1>Melhores filmes </h1>
	<hr>
	<div id="div_toprateds">
    <ul id="ul_toprateds">
      <?php
        include_once "api/api_toprated.php";
        foreach($toprated->results as $p){
		  echo '<li>
		  <a href="movie.php?id=' . $p->id . '">
		  <img src="http://image.tmdb.org/t/p/w300'. $p->poster_path . '">
		  <h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4>
		  <h5><em>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . "</em></h5></a>
		  </li>";
        }
      ?>
	</ul>
	</div>
		
<?php
  include_once "footer.php";
?>