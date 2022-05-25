<?php

require_once "models/modelEtudiant.php";

function listeEtudiant()
{

    $result = getEtudiants();
    require("views/viewAllEtudiants.php");
}

function listeUnEtudiant($id)
{
    $result = getUnEtudiant($id);
    require("views/viewOneEtudiant.php");
}

function afficheAddEtudiant()
{
    require("views/viewAddEtudiant.php");
}

function ajouteEtudiant()
{
    addEtudiant($_POST);
    require("views/viewSignIn.php");
}

function supprimerEtudiant($id)
{
    supprimeEtudiant($id);
}

function afficheModifEtudiant($id)
{
    $result = getUnEtudiant($id);
    require("views/viewModifEtudiant.php");
}

function modifEtudiant($id)
{
    updateEtudiant($id, $_POST);
}

// function logEtudiant($post)
// {
//     $m = $_POST['email'];
//     $c = $_POST['mdp'];
//     $bddPDO = connexionBDD();
//     $requete = "SELECT * FROM etudiant WHERE email=? AND mdp=?";
//     $stmt = $bddPDO->prepare($requete);
//     $stmt->execute(array($m, $c));
//     $data = $stmt->fetch(PDO::FETCH_ASSOC);
//     return $data;
// }
