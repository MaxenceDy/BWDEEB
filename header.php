<header>
    <?php 
        //var_dump( $connecte);
        if(isset($_SESSION['connecte']) && ($_SESSION['connecte'] == true)){
        ?>
            <a href="compte.php">Mon compte</a>
            <a href="logout.php">Deconnexion</a>
        <?php
        }
        else{ 
        ?>
            <a href="inscription.php">Inscription</a>
            <a href="login.php">Connexion</a>
        <?php 
        }
    ?>

    <img src="Images/Logo.png" alt="logo" id="logoHeader">
    <h1 id="titreHeader">Site du BDE</h1>
</header>

<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="activites.php">Activités</a></li>
        <li><a href="boutique.php">Boutique</a></li>
        <li><a href="suggestion.php">Suggestions d'idées</a></li>
        <li><a href="admin.php">Administration</a></li>            
    </ul>        
</nav>
