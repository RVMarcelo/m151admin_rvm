<?php

require './config.php';

// Se connect à la DB et renvoi la connexion à l'appelant
function GetDatabase(){
    static $dbc = null;
    if($dbc == null){
        try{
            $dbc = new PDO('mysql:dbname='.NAME.';host='.HOST.'',SER, PASSWORD);
        } catch (PDOException $e){
            echo "Connection to mysql is impossible :", $e->getMessage();
            die();
        }
    }
    return $dbc;
}
