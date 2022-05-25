<?php
require_once('models/model.php');

function getInscriptions()
{
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM inscription";
    $result = $bddPDO->query($requete);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getInscription($id)
{
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM inscription WHERE id_etudiant=? AND id_cours=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function addInscription($ins)
{
    $n = $_POST['id_cours'];
    $p = $_POST['id_etudiant'];
    $bddPDO = connexionBDD();
    $requete = "INSERT INTO inscription (id_cours, id_etudiant) VALUES(?,?)";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($n, $p));
}

function updateInscription($id, $post)
{
    $n = $_POST['id_cours'];
    $p = $_POST['id_etudiant'];
    $bddPDO = connexionBDD();
    $requete = "UPDATE inscription id_cours=?, id_etudiant=? WHERE id_etudiant=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($n, $p, $id));
}

function supprimeInscription($id)
{
    $bddPDO = connexionBDD();
    $requete = "DELETE FROM inscription WHERE id_etudiant=? AND id_cours=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($id));
}
