<?php 
  require('class/articles.php');; 
  include('verification.php'); 

  $articles = new articles();

  $detail = $articles->DetailArticle($_GET['id']);
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : <?php echo $detail[0]['Nom'] ?>></title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/produit.css">
  </head>

  <body>

  <?php include('header.php'); ?>
  
  <div id="wrapper">
    <div id="containerImg">
	    <img src=<?php echo '"../',$detail[0]['Image'], '"' ?>>
      <form>
        <p>Coloris : 
        <input type="radio" name="coloris" value="noir" checked>Noir</input>
        <input type="radio" name="coloris" value="rouge">Rouge</input>
        </p>
        <p>Tailles : 
        <input type="radio" name="taille" value="S">S</input>
        <input type="radio" name="taille" value="M" checked>M</input>
        <input type="radio" name="taille" value="L">L</input>
        <input type="radio" name="taille" value="XL">XL</input>
        </p>
      </form>
    </div>

    <aside id="containerDsc">
      <h1><?php echo $detail[0]['Nom'] ?></h1>
      <p>
        Description :<br><br>
        <?php echo $detail[0]['Description'] ?>
      </p>
      <p id="prix">Prix : <?php echo $detail[0]['Prix'],'€' ?></p>
    </aside>

  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>