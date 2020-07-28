<?php
  include "conf/info.php";
  session_start();
  include_once "header.php";
  
  $id_movie = $_GET['id'];
    include_once "api/api_movie_id.php";
    include_once "api/api_movie_similar.php";
    $title = "Detail Movie (".$movie_id->original_title.")";
  
?>

    <?php 
    if(isset($_GET['id'])){
    $id_movie = $_GET['id']; 
    ?>
    <h1><?php echo $movie_id->original_title ?></h1>
    <?php
      echo "<h5>".$movie_id->tagline."</h5>";
    ?>

<form class="newForm" method="post">
    <a href="mylist.php"><button type="addmylist" class="w3-button w3-green" name="addmylist" href="mylist.php" style="height: 30px; padding:5px">Adicionar a minha lista</button></a>
    </form>
    <?php
    if(isset($_POST["addmylist"])){
        include_once "api/api_addmovielist.php";
    }
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
    <div class="row_posters">
    <ul class="row_poster">
      <?php
        $count = 4;
        $output=""; 
        foreach($movie_similar_id->results as $sim){
          $output.='<li><a href="movie.php?id='.$sim->id.'"><img src="http://image.tmdb.org/t/p/w300'.$sim->backdrop_path.'"></a><h4>'.$sim->title.'</h4></li>';
          if($count <=0){
            break;
            $count--;
          }
        }
        echo $output;
      ?>
      </ul>
      </div>

<?php
}
  include_once "footer.php";
?>