<?php
require './db.php';
require './UserFunctions.php';
//require_once './connexion.php';
session_start();

/* if (isset($_SESSION['userlogin'])) {
  header('Location: users.php');
  exit;
  } */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Revisions Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header><h1>Formulaire 
                <?php
                if (isset($_SESSION['userlogin'])) {
                    echo $_SESSION['userlogin'];
                }
                ?></h1></header>
        <section>

            <form action="db.php" method="post">
                <div>
                    <?php
                    if (!isset($_GET['id'])) {
                        echo '<br><label for = "nom">Nom:</label><input id = "nom" type = "text" placeholder = "Nom" name = "nom" required/><br>';
                        echo '<br><label for = "prenom">Prénom:</label><input id = "prenom" type = "text" placeholder = "Prenom" name = "prenom" required/><br>';
                        echo '<br><label for = "date">Date de naissance:</label><input id = "date" type = "date" name = "date" required/><br>';
                        echo '<br><label for = "pseudo">Pseudo:</label><input id = "pseudo" type = "text" placeholder = "Pseudo" name = "pseudo" required/><br>';
                        echo '<br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Mot de passe" name = "mdp" required/><br>';
                        echo '<br><label for = "email">Email:</label><input id = "email" type = "email" placeholder = "Email" name = "email" required/><br>';
                        echo '<br><label for = "description">Description:</label><textarea id = "description" rows = "5" cols = "25" placeholder = "description" name = "description"></textarea><br>';
                        echo '<input type = "submit" name = "envoyer" value = "Envoyer"/>';
                        echo '<input type = "button" name = "annuler" value = "Annuler"/><br/>';
                        echo '<a href = "users.php">Utilisateurs</a><br />';
                    } else {
                        $user = getOneUser($_GET['id']);
                        ShowFormModif($user);
                    }
                    if (isset($_SESSION['userlogin'])) {
                        echo '<br /><a href="deco.php">Logout</a>';
                    } else {
                        echo '<a href = "connexion.php">Connexion</a>';
                    }
                    ?>                    
                </div>                
            </form>            
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
