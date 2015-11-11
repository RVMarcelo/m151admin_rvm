<?php
require './db.php';
require './UserFunctions.php';
//require_once './connexion.php';
session_start();

/*if (isset($_SESSION['userlogin'])) {
    header('Location: users.php');
    exit;
}*/
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
                        ShowFormNew();
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
