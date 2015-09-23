<?php
require './db.php';
require './UserFunctions.php';
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
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Détails</th>
                    <th>Modifier</th>
                </tr>
                <?php ShowUser();?>
            </table>
            <a href="index.php">Back to form</a>
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
