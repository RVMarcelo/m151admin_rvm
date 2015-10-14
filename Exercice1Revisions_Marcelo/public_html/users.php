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

                <?php
                    if(isset($_GET['idDelete']))
                    {
                        $idDelete = $_GET['idDelete'];
                        deleteUser($idDelete);
                        header('location:users.php');
                    }
                
                    if (!isset($_GET['id'])) {
                        ShowUser(TableShowUser());
                    } else {
                        ShowUserDetails(TableShowOneUser());
                    }
                ?>
            </table>
            <a href = "index.php">Formulaire</a><br/>
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
