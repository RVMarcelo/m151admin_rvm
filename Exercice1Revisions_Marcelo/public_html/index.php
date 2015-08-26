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
                    <p><label>Nom:</label><input type="text" placeholder="Nom" name="nom"/></p>
                    <p><label>Prénom:</label><input type="text" placeholder="Prenom" name="prenom"/></p>
                    <p><label>Date de naissance:</label><input type="date" name="date"/></p>
                    <p><label>Pseudo:</label><input type="text" placeholder="Pseudo" name="pseudo"/></p>
                    <p><label>Password:</label><input type="text" placeholder="Mot de passe" name="mdp"/></p>
                    <p><label>Email:</label><input type="text" placeholder="Email" name="email"/></p>
                    <p><label>Description:</label><textarea rows="5" cols="25" placeholder="description" name="description"></textarea></p>
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
