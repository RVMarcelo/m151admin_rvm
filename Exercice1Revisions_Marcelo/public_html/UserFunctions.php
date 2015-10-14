<?php

function ShowFormNew() {
    echo '<br><label for = "nom">Nom:</label><input id = "nom" type = "text" placeholder = "Nom" name = "nom" required/><br>';
    echo '<br><label for = "prenom">Prénom:</label><input id = "prenom" type = "text" placeholder = "Prenom" name = "prenom" required/><br>';
    echo '<br><label for = "date">Date de naissance:</label><input id = "date" type = "date" name = "date" required/><br>';
    echo '<br><label for = "pseudo">Pseudo:</label><input id = "pseudo" type = "text" placeholder = "Pseudo" name = "pseudo" required/><br>';
    echo '<br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Mot de passe" name = "mdp" required/><br>';
    echo '<br><label for = "email">Email:</label><input id = "email" type = "email" placeholder = "Email" name = "email" required/><br>';
    echo '<br><label for = "description">Description:</label><textarea id = "description" rows = "5" cols = "25" placeholder = "description" name = "description"></textarea><br>';
    echo '<input type = "submit" name = "envoyer" value = "Envoyer"/>';
    echo '<input type = "button" name = "annuler" value = "Annuler"/><br/>';
    echo '<a href = "users.php">Utilisateurs</a>';
    echo '<a href = "connexion.php">Connexion</a>';
}

function ShowFormModif() {   
    $user = getOneUser($_GET['id']);
    
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
    echo '<br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Modifie pas le mdp" name = "mdp"  value="' . $mdp . '" disabled/><br>';
    echo '<br><label for = "email">Email:</label><input id = "email" type = "email" placeholder = "Email" name = "email" value="' . $email . '" required/><br>';
    echo '<br><label for = "description">Description:</label><textarea id = "description" rows = "5" cols = "25" placeholder = "description" name = "description">'.$description.'</textarea><br>';
    echo '<input type = "submit" name = "modifButton" value = "Modify"/>';
    echo '<input type = "button" name = "annuler" value = "Annuler"/><br/>';
    echo '<a href = "users.php">Utilisateurs</a>';
    echo '<a href = "connexion.php">Connexion</a>';
}

function ShowFormConnection() {
    echo '<br><label for = "pseudo">Pseudo:</label><input id = "pseudo" type = "text" placeholder = "Pseudo" name = "pseudo" required/><br>';
    echo '<br><label for = "mdp">Password:</label><input id = "mdp" type = "password" placeholder = "Mot de passe" name = "mdp" required/> <br><br>';
    echo '<input type = "submit" name = "connecter" value = "Se connecter"/>';
    echo '<input type = "button" name = "annuler" value = "Annuler"/><br><br>';
}

function TableShowUser() {
    echo '<tr>';
    echo '<th>Nom</th>';
    echo '<th>Prénom</th>';
    echo '<th>Email</th>';
    echo '<th>Détails</th>';
    echo '<th>Modifier</th>';
    echo '<th>Supprimer</th>';
    echo '</tr>';
}

function TableShowOneUser() {
    echo '<tr>';
    echo '<th>Nom</th>';
    echo '<th>Prénom</th>';
    echo '<th>Date</th>';
    echo '<th>Pseudo</th>';
    echo '<th>Mot de passe</th>';
    echo '<th>Email</th>';
    echo '<th>Description</th>';
    echo '<th>Détails</th>';
    echo '</tr>';
}

function ShowUser() {
    $dataAll = getAllFields();

    foreach ($dataAll as $user) {
        echo '<tr>';
        echo '<td>' . $user['Nom'] . '</td>';
        echo '<td>' . $user['Prenom'] . '</td>';
        echo '<td>' . $user['Email'] . '</td>';
        echo '<td><a href="users.php?id=' . $user['ID'] . '">Details</a></td>';
        echo '<td><a href="index.php?id=' . $user['ID'] . '" name="modifLink">Modifier</a></td>';
        echo '<td><a href="users.php?idDelete='. $user['ID'] .'" name="deleteUser">Supprimer</a></td>';
        echo '</tr>';
    }
}

function ShowUserDetails() {
    $user = getOneUser($_GET['id']);

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
