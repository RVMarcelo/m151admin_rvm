<?php

require './config.php';

$table = 'formulaire';

// Se connect à la DB et renvoi la connexion à l'appelant
function GetDatabase() {
    static $dbc = null;
    if ($dbc == null) {
        try {
            $dbc = new PDO('mysql:dbname=' . NAME . ';host=' . HOST . '', USER, PASSWORD);
            $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection to mysql is impossible :", $e->getMessage() . "<br/>";
            die();
        }
    }
    return $dbc;
}

if (isset($_REQUEST['envoyer'])) {
    
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $date = filter_input(INPUT_POST, 'date');
    $pseudo = filter_input(INPUT_POST, 'pseudo');
    $mdp = filter_input(INPUT_POST, 'mdp');
    $email = filter_input(INPUT_POST, 'email');
    $description = filter_input(INPUT_POST, 'description');
    
    CreateUser($nom, $prenom, $date, $pseudo, $mdp, $email, $description);
    header("Location: users.php");
}
if (isset($_REQUEST['modifLink'])) {
    header("Location: index.php?=" . $_GET['id']);
}
if (isset($_REQUEST['modifButton'])) {
    
    $id = filter_input(INPUT_POST, 'id');
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $date = filter_input(INPUT_POST, 'date');
    $pseudo = filter_input(INPUT_POST, 'pseudo');
    $mdp = filter_input(INPUT_POST, 'mdp');
    $email = filter_input(INPUT_POST, 'email');
    $description = filter_input(INPUT_POST, 'description');
    
    modifyUser($id, $nom, $prenom, $date, $pseudo, $mdp, $email, $description);
    header("Location: users.php");
}

function CreateUser($nom, $prenom, $date, $pseudo, $mdp, $email, $description) {
    global $table;

    $dbc = GetDatabase();
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
}

function modifyUser($id, $nom, $prenom, $date, $pseudo, $mdp, $email, $description) {
    global $table;

    

    $dbc = GetDatabase();
    $dbc->quote($table);
    $req = "UPDATE " . $table . " SET Nom=:nom, Prenom=:prenom, Date=:date, Pseudo=:pseudo, Password=SHA1(:mdp), Email=:email, Description=:description WHERE ID = " . $id . ";";

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
    //var_dump($requPrep);
}

function deleteUser($idDelete) {
    $deleteUser = GetDatabase()->prepare('DELETE FROM formulaire WHERE ID=' . $idDelete . ';');
    $deleteUser->execute();
}

function login($username, $pass) {
    global $table;
    
    $request = GetDatabase()->prepare("SELECT Pseudo, Password FROM " . $table . " WHERE Pseudo = :pseudo AND Password=SHA1(:mdp) LIMIT 1");
    $request->bindParam(':pseudo', $username);
    $request->bindParam(':mdp', $pass);
    $request->execute();
    
    return $request->fetch();
}

function getAllFields() {
    global $table;

    //Connexion à la base de données et création de la requette
    $dbc = GetDatabase();
    $dbc->quote($table);
    $req = "SELECT * FROM " . $table;

    //Preparation de la requete  et des parametres
    $requPrep = $dbc->prepare($req);

    //Execution de la requette et recuperation des données
    $requPrep->execute();
    $data = $requPrep->fetchAll();
    $requPrep->closeCursor();
    return $data;
}

function getOneUser($id) {

    global $table;
    //Connexion à la base de données et création de la requette
    $req = GetDatabase()->query("SELECT * FROM " . $table . " WHERE ID = " . $id . " LIMIT 1");

    return $req->fetch();
}
