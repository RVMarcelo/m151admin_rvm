<?php

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
        echo '<td><a href="index.php?id=' . $user['ID'] . '" name="modif">Modifier</a></td>';
        echo '<td><input type="submit" value="Supprimer" name="supprimer"/></td>';
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
    echo '<td><a href="users.php">Retour</a></td>';
    echo '</tr>';
    
}
