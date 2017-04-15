<?php include('verification.php'); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Commentaires</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/commentaire-photo.css">
    <link rel="stylesheet" type="text/css" href="script/malihu-custom-scrollbar/jquery.mCustomScrollbar.min.css">
  </head>

  <body>

  <?php include('header.php'); ?>
    
	<div id="wrapper">
    <h1>Commentaire Photo</h1>

    <div id="PhotoCom">
      <div class="container">
        <img id="monImg" src="Images/foret.png">
        <br>
        <a href="" onclick=""><img src="Images/poucebleu.jpg" alt="j'aime" id="jaime"></a>
      </div>
      <div class="container custom-scroll-bar" id="ComOut">
        <div id="ComIn">
          <h4>LIAUD Joshua<br></h4>
          <br>
          <hr></hr>
          <p>Je commente une première fois</p>
        </div>
        <div id="ComIn">
          <h4>LIAUD Joshua<br></h4>
          <br>
          <hr></hr>
          <p>Je commente une deuxième fois</p>
        </div>
        <div id="ComIn">
          <h4>LIAUD Joshua<br></h4>
          <br>
          <hr></hr>
          <p>Je commente une troisième fois</p>
        </div>
        <div id="ComIn">
          <h4>LIAUD Joshua<br></h4>
          <br>
          <hr></hr>
          <p>Je commente une cinquifème fois</p>
        </div>
        <div id="ComIn">
          <h4>LIAUD Joshua<br></h4>
          <br>
          <hr></hr>
          <p>Je commente une sixième fois bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla</p>
        </div>
        <br>
      </div>
    </div>
    <!-- Agrandissement -->
    <div id="monAgrandissement" class="Agrandissement">
      <span class="close">×</span>
      <img class="Agrandissement-content" id="img01">
      <div id="caption"></div>
    </div>
  </div>
  <script src="script/jquery-3.2.1.js"></script>
  <script src="script/malihu-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="script/custom.js"></script>

  <?php include 'footer.php'; ?>
	
  </body>
</html>