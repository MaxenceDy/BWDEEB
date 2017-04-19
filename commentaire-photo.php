<?php 
  require_once('class/like.php');
  require_once('class/votesActis.php');
  require_once('class/users.php');
  include('verification.php'); 
  $likes = new like();
  $comm = new votesActis();
  $user = new users();

  $message;

  if(!isset($_SESSION['connecte'])){
    header('Location:erreur.php');
  }

  $count = $likes->CountLike($_GET['id']);

  $commentaires = $comm->Commentaires($_GET['id']);
  $image = $comm->DetailPhoto($_GET['id']);
  $id = $user->GetUserID($_SESSION['email']);
  var_dump($id[0]['ID']);
  $hasliked = $likes->GetUserLike($_SESSION['email'], $_GET['id']);
?>

<?php 
  if(isset($_GET['vote'])){
    if($_GET['vote'] == 'true'){
      if(!$hasliked == null){
        $message = "vous avez deja like";
      }
      else{
        var_dump(intVal($id[0]['ID']));
        $likes->Like($id[0]['ID'], $_GET['id']);
        $message = "vous avez like";
      }
    }
    else{
      $message = "Quelque chose a mal tourné";
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <title>BDE Exia Reims : Commentaires</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/commentaire-photo.css">
    <link rel="stylesheet" type="text/css" href="script/malihu-custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="script/form.css">    
  </head>

  <body>

  <?php include('header.php'); ?>
    
	<div id="wrapper">
    <h1>Commentaires</h1>

    <?php 
      if(isset($message)){
        echo "<p>",htmlspecialchars($message), "</p>";
      }
    ?>

    <div id="PhotoCom">
      <div class="container">
        <img id="monImg" src=<?php echo $image[0]['Image']?>>
        <br>
        <div class="container" id="all_jaime">
          <a href=<?php echo 'commentaire-photo.php?id=', $_GET['id'], '&vote=true' ?>><img src="Images/poucebleu.jpg" alt="j'aime" id="jaime"></a>
          <div id="Compteur_jaime">Nombre de J'aime : <?php echo $count[0]['Likes'] ?></div>
        </div>
      </div>
      <div id="OutCom">
        <div class="container custom-scroll-bar" id="ComOut">
          <!--CONTAINER MODELE
          <div id="ComIn">
            <h4>LIAUD Joshua<br></h4>
            <br>
            <hr></hr>
            <p>Je commente une première fois</p>
          </div>
          -->
          
          <?php 
            foreach($commentaires as $e){?>
              <div id="ComIn">
                <h4><?php echo $e['Nom'], ' ', $e['Prenom']?><br></h4>
                <br>
                <hr></hr>
                <p><?php echo $e['Commentaire'] ?></p>
              </div>
            <?php }
          ?>

          <br>
        </div>
        <div class="container">
          <textarea name="sugestion" class="formCom custom-scroll-bar" id="suggestion" row="10" cols="40"></textarea>
        </div>
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