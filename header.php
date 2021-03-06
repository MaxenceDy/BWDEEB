<?php 
  require_once('class/users.php');

  $user = new users();
  if(isset($_SESSION['email'])){
    $infos = $user->GetUserInfo($_SESSION['email']);
	$fonction = $user->GetUserFonction($_SESSION['email']);
  }
?>

<header>
    <div id="containerG">
        <img src="http://localhost/BWDEEB/Images/Logo.png" alt="logo" id="logoHeader">    
        <h1 id="titreHeader">Site du BDE</h1>    
    </div>

    <div id="containerD">
        <?php 
        //var_dump( $connecte);
        if(isset($_SESSION['connecte']) && ($_SESSION['connecte'] == true))
        {
            if(isset($infos)){
                echo '<div id="infos"><img src="http://localhost/BWDEEB/', $infos[0]['Avatar'] ,'" alt="avatar" id="avatar"><p>',$infos[0]['Prenom'], ' ', $infos[0]['Nom'], '</p></div>';
            } ?>
            <a href="http://localhost/BWDEEB/logout.php">Deconnexion</a>
            <a href="http://localhost/BWDEEB/compte.php">Mon compte</a>
        <?php
        }
        else{ 
        ?>
            <a href="http://localhost/BWDEEB/login.php">Connexion</a>
            <a href="http://localhost/BWDEEB/inscription.php">Inscription</a>            
        <?php 
        }
    ?>
    </div>
</header>

<nav>
    <ul>
        <li><a href="http://localhost/BWDEEB/index.php">Accueil</a></li>
        <li><a href="http://localhost/BWDEEB/activites.php">Activités</a></li>
        <li><a href="http://localhost/BWDEEB/boutique.php">Boutique</a></li>
        <?php if(isset($_SESSION['connecte']) && ($_SESSION['connecte'] == true)){
        ?>
            <li><a href="http://localhost/BWDEEB/suggestion.php">Suggestions d'idées</a></li>
			<?php if($fonction[0]['Funct'] != 3){ ?>
				<li><a href="http://localhost/BWDEEB/admin.php">Administration</a></li>
			<?php
				} 
			}
			?>
    </ul>        
</nav>
