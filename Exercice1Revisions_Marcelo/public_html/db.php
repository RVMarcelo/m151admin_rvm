<?php

require_once './config.php';
session_start();

$table = 'formulaire';
$tableClasse = 'classes';
$tableSport = 'sports';

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
    $classe = filter_input(INPUT_POST, 'classe');

    CreateUser($nom, $prenom, $date, $pseudo, $mdp, $email, $description, $classe);
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

if (isset($_REQUEST['envoyersport'])) {
    $flag = FALSE;
    while ($flag == FALSE) {
        if ($_REQUEST['sport1'] == $_REQUEST['sport2']) {
            $flag = TRUE;
            break;
        }
        if ($_REQUEST['sport1'] == $_REQUEST['sport3']) {
            $flag = TRUE;
            break;
        }
        if ($_REQUEST['sport1'] == $_REQUEST['sport4']) {
            $flag = TRUE;
            break;
        }
        if ($_REQUEST['sport2'] == $_REQUEST['sport3']) {
            $flag = TRUE;
            break;
        }
        if ($_REQUEST['sport2'] == $_REQUEST['sport4']) {
            $flag = TRUE;
            break;
        }
        if ($_REQUEST['sport3'] == $_REQUEST['sport4']) {
            $flag = TRUE;
            break;
        }

        break;
    }

    if ($flag == TRUE) {
        echo 'VOUS NE POUVEZ PAS CHOISIR LE MÊME SPORT.';
    }

    echo '<br /><a href="joursport.php">Back</a>';

    $Userid = $_SESSION['userlogin'];
    $sport1 = $_POST['sport1'];
    $sport2 = $_POST['sport2'];
    $sport3 = $_POST['sport3'];
    $sport4 = $_POST['sport4'];
    
    SportChoice($Userid, $sport1, $sport2, $sport3, $sport4);
}

function CreateUser($nom, $prenom, $date, $pseudo, $mdp, $email, $description, $classe) {
    global $table;

    $dbc = GetDatabase();
    $dbc->quote($table);
    $req = "INSERT INTO $table (Nom, Prenom, Date, Pseudo, Password, Email, Description, IDClasse) VALUES (:nom, :prenom, :date, :pseudo, SHA1(:mdp), :email, :description, :classe)";

    //Preparation de la requete  et des parametres
    $requPrep = $dbc->prepare($req);
    $requPrep->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requPrep->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requPrep->bindParam(':date', $date, PDO::PARAM_STR);
    $requPrep->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $requPrep->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $requPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $requPrep->bindParam(':description', $description, PDO::PARAM_STR);
    $requPrep->bindParam(':classe', $classe, PDO::PARAM_STR);

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

function getClasse() {
    global $tableClasse;

    //Connexion à la base de données et création de la requette
    $dbc = GetDatabase();
    $dbc->quote($tableClasse);
    $req = "SELECT * FROM " . $tableClasse;

    //Preparation de la requete  et des parametres
    $requPrep = $dbc->prepare($req);

    //Execution de la requette et recuperation des données
    $requPrep->execute();
    $data = $requPrep->fetchAll();
    $requPrep->closeCursor();
    return $data;
}

function getSports() {
    global $tableSport;

    //Connexion à la base de données et création de la requette
    $dbc = GetDatabase();
    $dbc->quote($tableSport);
    $req = "SELECT * FROM " . $tableSport;

    //Preparation de la requete  et des parametres
    $requPrep = $dbc->prepare($req);

    //Execution de la requette et recuperation des données
    $requPrep->execute();
    $data = $requPrep->fetchAll();
    $requPrep->closeCursor();
    return $data;
}

function SportChoice($Userid, $sport1, $sport2, $sport3, $sport4) {
    /* try {
      $conn->beginTransaction();
      //Inserts
      $conn->commit();
      } catch (Exception $ex) {
      $conn->rollback();
      } */
    
    $req1 = GetDatabase()->prepare('INSERT INTO choix VALUES(:sport1, :ID, 1');
    $req1->bindParam(':sport1', $sport1, PDO::PARAM_STR);
    $req1->bindParam(':ID', $Userid, PDO::PARAM_STR);
    $req1->execute();
    
    $req2 = GetDatabase()->prepare('INSERT INTO choix VALUES(:sport2, :ID, 2');
    $req2->bindParam(':sport2', $sport2, PDO::PARAM_STR);
    $req2->bindParam(':ID', $Userid, PDO::PARAM_STR);
    $req2->execute();
    
    $req3 = GetDatabase()->prepare('INSERT INTO choix VALUES(:sport3, :ID, 3');
    $req3->bindParam(':sport3', $sport3, PDO::PARAM_STR);
    $req3->bindParam(':ID', $Userid, PDO::PARAM_STR);
    $req3->execute();
    
    $req4 = GetDatabase()->prepare('INSERT INTO choix VALUES(:sport4, :ID, 4');
    $req4->bindParam(':sport4', $sport4, PDO::PARAM_STR);
    $req4->bindParam(':ID', $Userid, PDO::PARAM_STR);
    $req4->execute();
}
