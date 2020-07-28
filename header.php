<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?php echo $sitename ?>
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
<div class="header">
		<h2><a href="index.php" style="color: white;">Página principal</a></h2>
	</div>
	<div class="content">
    <ul>
    <li><a style="color: green;" name="email">Seja bem vindo <?php echo $_SESSION['username']?>!</a></li>
      <li><a href="mylist.php" style="color: green;">Minha Lista</a></li>
      <li><a href="index.php?logout='1'" style="color: red;">Logout</a></li>
    </ul>
	</div>
	<div>
	<form action="search.php" method="get">
      <input type="text" name="search" placeholder="Digite um filme" required>
      <select name="channel" required>
        <option value="movie" selected="selected">Filme</option>
      </select>
      <button type="submit">Procurar! </button>
    </form>
	</div>