<?php
require_once('models/model.php');

function getEtudiants()
{

    $bddPDO = connexionBDD();
    $requete = 'SELECT * FROM etudiant ORDER BY id ASC';
    $result = $bddPDO->query($requete);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getUnEtudiant($id)
{
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM etudiant WHERE id=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function addEtudiant($etu)
{
    $n = $_POST['nom'];
    $p = $_POST['prenom'];
    $m = $_POST['mail'];
    $c = $_POST['mdp'];
    $h = hash('sha256', $c);
    $bddPDO = connexionBDD();
    $requete = "INSERT INTO etudiant (nom, prenom, email,mdp) VALUES(?,?,?,?)";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($n, $p, $m, $h));
}

function updateEtudiant($id, $post)
{
    $n = $post['nom'];
    $p = $post['prenom'];
    $m = $post['mail'];
    $c = $post['mdp'];
    $h = hash('sha256', $c);
    $bddPDO = connexionBDD();
    $requete = "UPDATE etudiant SET nom=?, prenom=?, email=?, mdp=? WHERE id=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($n, $p, $m, $h, $id));
}

function supprimeEtudiant($id)
{
    $bddPDO = connexionBDD();
    $requete = "DELETE FROM etudiant WHERE id=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($id));
}

function logEtudiant($post)
{
    $m = $_POST['email'];
    $c = $_POST['mdp'];
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM etudiant WHERE email=? AND mdp=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($m, $c));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
