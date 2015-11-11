<?php
require './db.php';
require './UserFunctions.php';
session_start();
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
        <header><h1>Users</h1></header>
        <section>            
            <table border="1">

                <?php
                if (isset($_GET['idDelete'])) {
                    $idDelete = $_GET['idDelete'];
                    deleteUser($idDelete);
                    header('location:users.php');
                }

                if (!isset($_GET['id'])) {
                    echo '<tr>';
                    echo '<th>Nom</th>';
                    echo '<th>Prénom</th>';
                    echo '<th>Email</th>';
                    echo '<th>Détails</th>';
                    echo '<th>Modifier</th>';
                    echo '<th>Supprimer</th>';
                    echo '</tr>';
                    ShowUser();
                } else {
                    echo '<tr>';
                    echo '<th>Nom</th>';
                    echo '<th>Prénom</th>';
                    echo '<th>Date</th>';
                    echo '<th>Pseudo</th>';
                    echo '<th>Mot de passe</th>';
                    echo '<th>Email</th>';
                    echo '<th>Description</th>';
                    echo '<th>Détails</th>';
                    echo '</tr>';
                    $user = getOneUser($_GET['id']);
                    ShowUserDetails($user);
                }
                echo '</table> ';
                if (isset($_SESSION['userlogin'])) {
                    echo '<br /><a href="deco.php">Logout</a>';
                } else {
                    echo '<a href = "index.php">Formulaire</a><br/>';
                    echo '<a href = "connexion.php">Connexion</a>';
                }
                ?>                       
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
