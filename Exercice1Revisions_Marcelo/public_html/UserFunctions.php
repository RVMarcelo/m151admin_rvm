<?php

//TODO je suis pas convaincue de cette manière d'appeler le getOneUser dans la fonction de showFormModif, cela créé une interdépendence entre les deux
//il faudrait peut-être plutot faire cet appel endehors puis appeler ShowFormModif en passant en paramètre $user. Pareil pour les autres
//endroits où vous avez ce genre d'interdépendence
function ShowFormModif($user) {

    $id = $user['ID'];
    $nom = $user['Nom'];
    $prenom = $user['Prenom'];
    $date = $user['Date'];
    $pseudo = $user['Pseudo'];
    $mdp = $user['Password'];
    $email = $user['Email'];
    $description = $user['Description'];

    echo '<br><input type="hidden" id="id" name="id" value="' . $id . '"/>';
    echo '<br><label for = "nom">Nom:</label><input id = "nom" type = "text" placeholder = "Nom" name = "nom" value="' . $nom . '" required/><br>';
    echo '<br><label for = "prenom">Prénom:</label><input id = "prenom" type = "text" placeholder = "Prenom" name = "prenom" value="' . $prenom . '" required/><br>';
    echo '<br><label for = "date">Date de naissance:</label><input id = "date" type = "date" name = "date" value="' . $date . '" required/><br>';
    echo '<br><label for = "pseudo">Pseudo:</label><input id = "pseudo" type = "text" placeholder = "Pseudo" name = "pseudo" value="' . $pseudo . '" required/><br>';
    echo '<br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Entrez nouveau mot de passe" name = "mdp"  value=""/><br>';
    echo '<br><label for = "email">Email:</label><input id = "email" type = "email" placeholder = "Email" name = "email" value="' . $email . '" required/><br>';
    echo '<br><label for = "description">Description:</label><textarea id = "description" rows = "5" cols = "25" placeholder = "description" name = "description">' . $description . '</textarea><br>';
    echo '<input type = "submit" name = "modifButton" value = "Modify"/>';
    echo '<input type = "button" name = "annuler" value = "Annuler"/><br/>';
    echo '<a href = "users.php">Utilisateurs</a><br />';
}

function ShowUser() {
    $dataAll = getAllFields();

    foreach ($dataAll as $user) {
        echo '<tr>';
        echo '<td>' . $user['Nom'] . '</td>';
        echo '<td>' . $user['Prenom'] . '</td>';
        echo '<td>' . $user['Email'] . '</td>';
        echo '<td><a href="users.php?id=' . $user['ID'] . '">Details</a></td>';
        //else{
        if (isset($_SESSION['userlogin']) && $_SESSION['userlogin'] == $user['Pseudo']) {
            echo '<td><a href="index.php?id=' . $user['ID'] . '" name="modifLink">Modifier</a></td>';
            echo '<td><a href="deco.php" name="deleteUser">Supprimer</a></td>';
        } else {
            foreach ($dataAll as $user) {
                if (isset($_SESSION['userlogin']) && $_SESSION['userlogin'] == $user['Pseudo'] && $user['estAdmin']) {
                    echo '<td><a href="index.php?id=' . $user['ID'] . '" name="modifLink">Modifier</a></td>';
                    echo '<td><a href="deco.php" name="deleteUser">Supprimer</a></td>';
                }
            }
            echo '</tr>';
        }
    }
}

function ShowUserDetails($user) {

    echo '<tr>';
    echo '<td>' . $user['Nom'] . '</td>';
    echo '<td>' . $user['Prenom'] . '</td>';
    echo '<td>' . $user['Date'] . '</td>';
    echo '<td>' . $user['Pseudo'] . '</td>';
    echo '<td>' . $user['Password'] . '</td>';
    echo '<td>' . $user['Email'] . '</td>';
    echo '<td>' . $user['Description'] . '</td>';
    echo '<td><a href="users.php">Retour</a></td>';
    echo '</tr>';
}
