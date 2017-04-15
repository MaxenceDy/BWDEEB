<?php
  session_start();
  if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    $connecte = $_SESSION['email'] . 'est connecte avec' . $_SESSION['password'];
  }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/header.css"> 
  </head>

  <body>
    
    <?php include('header.php'); ?>

    <?php echo $connecte ?>

    <div id="wrapper">
        <div class= "texte-index">
          <h1 id="BDE">Site du BDE</h1>
          <hr></hr>
          <h2>Centre de Reims</h2>
        </div>
        <img id="deventure" src="Images/deventure.jpg" alt="deventure du CESI" />
    </div>

    <?php include 'footer.php'; ?>
    
  </body>
</html>