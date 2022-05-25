<?php
require_once("configs/config.php");

function connexionBDD()
{
    try {
        $bdd = new PDO(_DB_DSN, _DB_USER, _DB_PASS, _DB_OPTIONS);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
