<?php

require './config.php';

// Se connect à la DB et renvoi la connexion à l'appelant
function GetDatabase() {
    static $dbc = null;
    if ($dbc == null) {
        try {
            $dbc = new PDO('mysql:dbname=' . NAME . ';host=' . HOST . '', USER, PASSWORD);
        } catch (PDOException $e) {
            echo "Connection to mysql is impossible :", $e->getMessage() . "<br/>";
            die();
        }
    }
    return $dbc;
}

if (isset($_POST['envoyer'])) {
    CreateUser();
    header("Location: index.php");
}

function CreateUser() {
    $table = 'formulaire';

    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $date = filter_input(INPUT_POST, 'date');
    $pseudo = filter_input(INPUT_POST, 'pseudo');
    $mdp = filter_input(INPUT_POST, 'mdp');
    $email = filter_input(INPUT_POST, 'email');
    $description = filter_input(INPUT_POST, 'description');

    $dbc = GetDatabase(); //remove var and place fonction in $requPrep = ...->prepare
    $dbc->quote($table);
    $req = "INSERT INTO $table (Nom, Prenom, Date, Pseudo, Password, Email, Description) VALUES (:nom, :prenom, :date, :pseudo, SHA1(:mdp), :email, :description)";

    //Preparation de la requete  et des parametres
    $requPrep = $dbc->prepare($req);
    $requPrep->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requPrep->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requPrep->bindParam(':date', $date, PDO::PARAM_STR);
    $requPrep->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $requPrep->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $requPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $requPrep->bindParam(':description', $description, PDO::PARAM_STR);

    $requPrep->execute();
    $requPrep->closeCursor();


    /* $sql = "INSERT INTO formulaire (Nom, Prenom, Date, Pseudo, Password, Email, Description) 
     * VALUES (" .$nom .",".$prenom.",".$date.",".$pseudo.",".$mdp.",".$email.",".$description.")";

      $dbc->exec($sql);
      echo'test'; */
}
