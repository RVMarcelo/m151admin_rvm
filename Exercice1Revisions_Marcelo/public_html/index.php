<?php
require './db.php';

$nom = "";
$prenom = "";
$date = "";
$pseudo = "";
$email = "";
$description = "";

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
        <header><h1>Formulaire</h1></header>
        <section>
            <form action="db.php" method="post">
                <div>
                    <br><label for="nom">Nom:</label><input id="nom" type="text" placeholder="Nom" name="nom" required/><br>
                    <br><label for="prenom">Prénom:</label><input id="prenom" type="text" placeholder="Prenom" name="prenom" required/><br>
                    <br><label for="date">Date de naissance:</label><input id="date" type="date" name="date" required/><br>
                    <br><label for="pseudo">Pseudo:</label><input id="pseudo" type="text" placeholder="Pseudo" name="pseudo" required/><br>
                    <br><label for="mdp">Password:</label><input id="mdp" type="password" placeholder="Mot de passe" name="mdp" required/><br>
                    <br><label for="email">Email:</label><input id="email" type="email" placeholder="Email" name="email" required/><br>
                    <br><label for="description">Description:</label><textarea id="description" rows="5" cols="25" placeholder="description" name="description"></textarea><br>
                    <input type="submit" name="envoyer" value="Envoyer"/>
                    <input type="button" name="annuler" value="Annuler"/><br/>
                    <a href = "users.php">Utilisateurs</a>
                </div>
            </form>            
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
