<?php
require './db.php';

// Connexion à la DB
$bdd = connexionBD('login', $user, $password);
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
            <form>
                <div>
                    <p><label for="nom">Nom:</label><input id="nom" type="text" placeholder="Nom" name="nom"/></p>
                    <p><label for="prenom">Prénom:</label><input id="prenom" type="text" placeholder="Prenom" name="prenom"/></p>
                    <p><label for="date">Date de naissance:</label><input id="date" type="date" name="date"/></p>
                    <p><label for="pseudo">Pseudo:</label><input id="pseudo" type="text" placeholder="Pseudo" name="pseudo"/></p>
                    <p><label for="mdp">Password:</label><input id="mdp" type="text" placeholder="Mot de passe" name="mdp"/></p>
                    <p><label for="email">Email:</label><input id="email" type="email" placeholder="Email" name="email"/></p>
                    <p><label for="description">Description:</label><textarea id="description" rows="5" cols="25" placeholder="description" name="description"></textarea></p>
                    <p><input type="submit" name="envoyer" value="Envoyer"/>
                        <input type="button" name="annuler" value="Annuler"/></p>
                </div>
            </form>
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>