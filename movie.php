<?php
  include "conf/info.php";
  session_start();
  include_once "header.php";
  
  $id_movie = $_GET['id'];
    include_once "api/api_movie_id.php";
    include_once "api/api_movie_similar.php";
    $title = "Detail Movie (".$movie_id->original_title.")";
  
?>

    <form method="post">
    <button type="addmylist" name="addmylist" href="mylist.php">Add minha lista </button>
    </form>
    <?php
    if(isset($_POST["addmylist"])){
        include_once "api/api_addmovielist.php";
    }
    ?>

    <?php 
    if(isset($_GET['id'])){
    $id_movie = $_GET['id']; 
    ?>
    <h1><?php echo $movie_id->original_title ?></h1>
    <?php
      echo "<h5>".$movie_id->tagline."</h5>";
    ?>

    <hr>
          <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>">
          <p>Título : <?php echo $movie_id->original_title ?></p>
          <p>Slogan : <?php echo $movie_id->tagline ?></p>
          <p>Gêneros : 
              <?php
                foreach($movie_id->genres as $g){
                  echo '<span>' . $g->name . '</span> ';
                }
              ?>
          </p>
          <p>Descrição : <?php echo $movie_id->overview ?></p>
          <p>Data de lançamento : <?php $rel = date('d F Y', strtotime($movie_id->release_date)); echo $rel ?>
          <p>Empresas de produção :
              <?php
                foreach($movie_id->production_companies as $pc){
                  echo $pc->name." ";
                }
              ?>
          </p>
          <p>Países de produção :
              <?php
                foreach($movie_id->production_countries as $pco){
                  echo $pco->name. "&nbsp;&nbsp;" ;
                }
              ?>
          </p>
          <p>Orçamento: $ <?php echo $movie_id->budget ?> </p>
          <p>Média de votos : <?php echo $movie_id->vote_average ?></p>
          <p>Contagem de votos : <?php echo $movie_id->vote_count ?></p>

    <hr>
    <h3>Filmes similares</h3>
      <ul>
      <?php
        $count = 4;
        $output=""; 
        foreach($movie_similar_id->results as $sim){
          $output.='<li><a href="movie.php?id='.$sim->id.'"><img src="http://image.tmdb.org/t/p/w300'.$sim->backdrop_path.'"><h5>'.$sim->title.'</h5></a></li>';
          if($count <=0){
            break;
            $count--;
          }
        }
        echo $output;
      ?>
      </ul>

<?php
}
  include_once "footer.php";
?>