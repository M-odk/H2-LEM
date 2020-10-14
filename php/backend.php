<?php

require_once("../config.inc.php");

function verifierHash($pseudo)
{
    $db = connectDB();
    $sql = "SELECT * FROM superAdmin WHERE pseudo = :pseudo";
    $query = $db->prepare($sql);
    $query->execute([':pseudo'=> $pseudo]);
    // retourne les lignes une par une
    return $query->fetch(PDO::FETCH_ASSOC);  
}