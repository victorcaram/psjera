<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?php echo $sitename ?>
    </title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

  <body>
  <ul class="navlist">
    <li class="navlistli" style="margin-right: 70px;"><a href="index.php">
      <img
        class="nav_logo"
        src="https://jera.com.br/images/logo-jera-light.svg"
        alt="Jera Logo"
      />
    </a> </li>
    <li><a style="color: green;" name="email">Seja bem vindo <?php echo $_SESSION['username']?>!</a></li>
    <!--<li><a href="changeprofile.php" style="color: purple;">Mudar meu perfil</a></li>-->
    <li class="navlistli"><a href="mylist.php"><button class="w3-button w3-blue" style="height: 30px; padding:5px">Minha Lista</button></a></li>
    <li class="navlistli"><a href="index.php?logout='1'"><button  class="w3-button w3-red" href="index.php?logout='1'" style="height: 30px; padding:5px">Logout</button></a></li>
    <li><a><form action="search.php" method="get">
      <input style="color:black;" type="text" name="search" placeholder="Digite um filme" required>
      <button type="submit"  class="w3-button w3-dark-grey" style="height: 30px; padding:5px">Procurar! </button>
    </form></li></a>
    <li style="float:right"><a>
      <img
        class="nav_avatar"
        src="https://miro.medium.com/fit/c/160/160/1*fMiOKQyrIbtDpfJK8FOwxQ.png"
        alt="Jera Avatar"
      />
    </a> </li>
</ul>
<div style="margin-top:100px">
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
