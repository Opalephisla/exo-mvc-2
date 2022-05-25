<?php

require_once "models/modelInscription.php";

function listeInscription()
{

    $result = getInscriptions();
    require("views/viewAllInscriptions.php");
}

function listeUneInscription($id)
{
    $result = getInscription($id);
    // require("views/viewOneInscription.php");
}

function afficheAddInscription()
{
    // require("views/viewAddInscription.php");
}

function ajouteInscription()
{
    addInscription($_POST);
}

function supprimerInscription($id)
{
    supprimeInscription($id);
}

function afficheModifInscription($id)
{
    $result = getInscription($id);
    // require("views/viewModifInscription.php");
}

function modifInscription($id)
{
    updateInscription($id, $_POST);
}
