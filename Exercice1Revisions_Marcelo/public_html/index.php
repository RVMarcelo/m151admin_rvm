<?php
require './db.php';
require './UserFunctions.php';
//require_once './connexion.php';
session_start();

/* if (isset($_SESSION['userlogin'])) {
  header('Location: users.php');
  exit;
  } */
$nom = isset($_REQUEST['nom']) ? $_REQUEST['nom'] : "";
$prenom = isset($_REQUEST['prenom']) ? $_REQUEST['prenom'] : "";
$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : "";
$pseudo = isset($_REQUEST['pseudo']) ? $_REQUEST['pseudo'] : "";
$mdp = isset($_REQUEST['mdp']) ? $_REQUEST['mdp'] : "";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : "";


$classe = getClasse();
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
                    <?php if (!isset($_GET['id'])) { ?>                        
                        <br><label for = "nom">Nom:</label><input id = "nom" type = "text" placeholder = "Nom" name = "nom" value = "<?php echo $nom; ?>" required/><br>
                        <br><label for = "prenom">Prénom:</label><input id = "prenom" type = "text" placeholder = "Prenom" name = "prenom" value = "<?php echo $prenom; ?>" required/><br>
                        <br><label for = "date">Date de naissance:</label><input id = "date" type = "date" name = "date" value = "<?php echo $date; ?>" required/><br>

                        <br><label for = "classe">Classe:</label>
                        <select name="classe">                            
                            <?php
                            foreach ($classe as $data) {

                                echo '<option value = "' . $data['IDClasse'] . '" >' . $data['Label'] . '</option>';
                            }
                            ?>
                        </select><br>


                        <br><label for = "pseudo">Pseudo:</label><input id = "pseudo" type = "text" placeholder = "Pseudo" name = "pseudo" value = "<?php echo $pseudo; ?>" required/><br>
                        <br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Mot de passe" name = "mdp" value = "<?php echo $mdp; ?>" required/><br>
                        <br><label for = "email">Email:</label><input id = "email" type = "email" placeholder = "Email" name = "email" value = "<?php echo $email; ?>" required/><br>
                        <br><label for = "description">Description:</label><textarea id = "description" rows = "5" cols = "25" placeholder = "description" name = "description"><?php echo $description; ?></textarea><br>
                        <input type = "submit" name = "envoyer" value = "Envoyer"/>
                        <input type = "reset" name = "annuler" value = "Annuler"/><br/>
                        <a href = "users.php">Utilisateurs</a><br />                        
                        <?php
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
