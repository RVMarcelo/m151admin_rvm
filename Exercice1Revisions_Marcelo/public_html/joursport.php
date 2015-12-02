<?php
require './db.php';
require './UserFunctions.php';
//session_start();

$sport = getSports();

/* if ($_REQUEST['IDClasse'] === NULL) {
  header('Location: users.php');
  exit;
  } */
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Journée sportive</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header><h1>Veuillez choisir un sport pour la journée sportive</h1></header>
        <section>
            <form action="db.php" method="post">
                <div>                     
                    <label for="Sport">Sport 1:</label>
                    <select name="sport1">                     
                        <!--<option disabled selected>Choisir le sport</option>-->
                        <?php
                        foreach ($sport as $data) {                            
                            echo '<option value = "' . $data['IDSport'] . '" >' . $data['Label'] . '</option>';
                        }
                        ?>
                    </select><br><br>
                    <label for="Sport">Sport 2:</label>
                    <select name="sport2">                            
                        <?php
                        foreach ($sport as $data) {
                            echo '<option value = "' . $data['IDSport'] . '" >' . $data['Label'] . '</option>';
                        }
                        ?>
                    </select><br><br>
                    <label for="Sport">Sport 3:</label>
                    <select name="sport3">                            
                        <?php
                        foreach ($sport as $data) {
                            echo '<option value = "' . $data['IDSport'] . '" >' . $data['Label'] . '</option>';
                        }
                        ?>
                    </select><br><br>
                    <label for="Sport">Sport 4:</label>
                    <select name="sport4">                            
                        <?php
                        foreach ($sport as $data) {
                            echo '<option value = "' . $data['IDSport'] . '" >' . $data['Label'] . '</option>';
                        }
                        ?>
                    </select><br><br>
                    <input type = "submit" name = "envoyersport" value = "Envoyer"/>
                    <input type = "reset" name = "annuler" value = "Annuler"/><br/><br>
                    <a href = "users.php">Utilisateurs</a><br />                        
                    <?php
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
