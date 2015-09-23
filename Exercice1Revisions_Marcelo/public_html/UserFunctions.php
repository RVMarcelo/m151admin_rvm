<?php

$data = getAllFields();

function ShowUser() {
    global $data;

    foreach ($data as $user) {

        echo '<tr>';
        echo '<td>' . $user['Nom'] . '</td>';
        echo '<td>' . $user['Prenom'] . '</td>';
        echo '<td>' . $user['Email'] . '</td>';
        echo '<td><a href="users.php?id='.$user['ID'].'">Details</a></td>';
        echo '<td><a href="users.php?id='.$user['ID'].'">Modifier</a></td>';
        echo '</tr>';
    }
}

function ShowUserDetails() {
    global $data;

    foreach ($data as $user) {

        echo '<tr>';
        echo '<td>' . $user['Nom'] . '</td>';
        echo '<td>' . $user['Prenom'] . '</td>';
        echo '<td>' . $user['Date'] . '</td>';
        echo '<td>' . $user['Pseudo'] . '</td>';
        echo '<td>' . $user['Password'] . '</td>';
        echo '<td>' . $user['Email'] . '</td>';
        echo '<td>' . $user['Description'] . '</td>';
        echo '</tr>';
    }
}
