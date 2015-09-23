<?php

function TableShowUser() {
    echo '<tr>';
    echo '<th>Nom</th>';
    echo '<th>Prénom</th>';
    echo '<th>Email</th>';
    echo '<th>Détails</th>';
    echo '<th>Modifier</th>';
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
        echo '<td><a href="users.php?id=' . $user['ID'] . '">Modifier</a></td>';
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
    echo '</tr>';
    
}
