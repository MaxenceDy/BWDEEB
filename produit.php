<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : connexion</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/produit.css">
  </head>

  <body>

  <?php include('header.php'); ?>
  
  <div id="wrapper">
    <div id="containerImg">
	    <img src="Images/tshirt.jpg">
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
      <h1>Gourde Exia</h1>
      <p>
        Description :<br><br>
        Magnifique gourde avec le logo de l'Exia pour partir en balade.
      </p>
    </aside>

  </div>

  <?php include 'footer.php'; ?>
	
  </body>
</html>