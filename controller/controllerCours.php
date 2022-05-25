<?php

require_once "models/modelCours.php";

function listeCours()
{
    $result = getAllCours();
    require("views/viewAllCours.php");
}

function listeUnCours($id)
{
    $result = getUnCours($id);
    require("views/viewOneCours.php");
}

function afficheAddCours()
{
    require("views/viewAddCours.php");
}

function ajouteCours()
{
    addCours($_POST);
}
function supprimerCours()
{
    supprimeCours($_POST);
}

function afficheModifCours($id)
{
    $result = getUnCours($id);
    require("views/viewModifCours.php");
}

function modifCours($id)
{
    updateCours($id, $_POST);
}
