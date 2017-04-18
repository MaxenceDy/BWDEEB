<header>
    <?php 
        //var_dump( $connecte);
        if(isset($_SESSION['connecte']) && ($_SESSION['connecte'] == true)){
        ?>
            <a href="http://localhost/BWDEEB/compte.php">Mon compte</a>
            <a href="http://localhost/BWDEEB/logout.php">Deconnexion</a>
        <?php
        }
        else{ 
        ?>
            <a href="http://localhost/BWDEEB/inscription.php">Inscription</a>
            <a href="http://localhost/BWDEEB/login.php">Connexion</a>
        <?php 
        }
    ?>

    <img src="http://localhost/BWDEEB/Images/Logo.png" alt="logo" id="logoHeader">
    <h1 id="titreHeader">Site du BDE</h1>
</header>

<nav>
    <ul>
        <li><a href="http://localhost/BWDEEB/index.php">Accueil</a></li>
        <li><a href="http://localhost/BWDEEB/activites.php">Activités</a></li>
        <li><a href="http://localhost/BWDEEB/boutique.php">Boutique</a></li>
        <li><a href="http://localhost/BWDEEB/suggestion.php">Suggestions d'idées</a></li>
        <li><a href="http://localhost/BWDEEB/admin.php">Administration</a></li>            
    </ul>        
</nav>
