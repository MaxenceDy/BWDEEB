<?php
  require('class/articles.php');
  include('verification.php'); 

  $articles = new articles();

  $listeArticles = $articles->ListeArticles();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Boutique</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/boutique.css">
  </head>

  <body>

  <?php include('header.php'); ?>
    
	<div id="wrapper">
    <!--CONTAINER MODELE
    <div class="container">
      <a href="produit.php"><img src="Images/sweat.png"></a>
      <div class="fondTexte"></div>
      <p>Sweat</p>
    </div>
    -->

    <?php
      foreach($listeArticles as $e){?>
        <div class="container">
          <a href=<?php echo 'produit.php/',htmlspecialchars($e['ID']) ?> ><img src=<?php echo htmlspecialchars($e['Image']) ?>></a>
          <div class="fondTexte"></div>
          <p><?php echo $e['Nom'] ?></p>
        </div>
      <?php }
    ?>

  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>