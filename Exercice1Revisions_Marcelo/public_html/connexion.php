<?php
require_once './db.php';
require_once './UserFunctions.php';

$erreur = "";
if (isset($_REQUEST['connecter'])) {

    $userlogin = login($_REQUEST['pseudo'], $_REQUEST['mdp']);
    $isAdmin = $_REQUEST['estAdmin'];

    if ($userlogin !== false) {
        if ($isAdmin === 1) {
            session_start();
            $_SESSION['userlogin'] = $_REQUEST['pseudo'] && $_REQUEST['estAdmin'];
        } else {
            session_start();
            $_SESSION['userlogin'] = $_REQUEST['pseudo'];
        }
        header("Location: users.php");
        exit;
    } else {
        $erreur = "pseudo ou mot de passe est érroné";
        echo $erreur;
    }
}


$pseudo = isset($_REQUEST['pseudo']) ? $_REQUEST['pseudo'] : "";
$mdp = isset($_REQUEST['mdp']) ? $_REQUEST['mdp'] : "";
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
                    <br><label for = "pseudo">Pseudo:</label><input id = "pseudo" type = "text" placeholder = "Pseudo" name = "pseudo" value="<?php echo $pseudo; ?>" required/><br>
                    <br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Mot de passe" name = "mdp" value="<?php echo $mdp; ?>" required/> <br><br>
                    <input type = "submit" name = "connecter" value = "Se connecter"/>
                    <input type = "button" name = "annuler" value = "Annuler"/><br><br>
                    <a href = "users.php">Utilisateurs</a><br />
                    <a href = "index.php">Formulaire</a>              
                </div>
            </form>            
        </section>
        <footer>
            &copy; Rae Vennedict Marcelo 2015
        </footer>
    </body>
</html>
