<?php
require_once './db.php';
require_once './UserFunctions.php';

$erreur = "";
if (isset($_REQUEST['connecter'])) {

    $userlogin = login($_REQUEST['pseudo'], $_REQUEST['mdp']);

    if ($userlogin !== false) {       
        session_start();
        $_SESSION['userlogin'] = $_REQUEST['pseudo'];

        header("Location: users.php");
        exit;
    } else {
        $erreur = "pseudo ou mot de passe est érroné";
        echo $erreur;
    }
}
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

            <form method="post">
                <div>
                    <?php
                    ShowFormConnection();
                    ?>                    
                </div>
            </form>            
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
