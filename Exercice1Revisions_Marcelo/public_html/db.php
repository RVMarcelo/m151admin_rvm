<?php

require './config.php';

// Se connect à la DB et renvoi la connexion à l'appelant
function connexionBD() {
    static $bdd = null;
    global $databaseName;
    global $user;
    global $password;

    if ($bdd === null) {
        // Lorsqu'on veut lire des données en UTF-8 on peut utiliser des options avec PDO, sinon par défaut c'est du LATIN et ça bug (on peut aussi utiliser utf8_encode)
        $pdo_options[PDO::ATTR_PERSISTENT] = true;
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
        $bdd = new PDO('mysql:host=localhost;dbname=' . $databaseName, $user, $password, $pdo_options);
    }
    return $bdd;
}

