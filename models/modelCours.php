<?php
require_once('models/model.php');

function getAllCours()
{

    $bddPDO = connexionBDD();
    $requete = 'SELECT * FROM cours ORDER BY id ASC';
    $result = $bddPDO->query($requete);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getUnCours($id)
{
    $bddPDO = connexionBDD();
    $requete = "SELECT * FROM cours WHERE id=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function addCours($class)
{
    $n = $_POST['code'];
    $p = $_POST['titre'];
    $m = $_POST['language'];
    $bddPDO = connexionBDD();
    $requete = "INSERT INTO cours (code, titre, language) VALUES(?,?,?)";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($n, $p, $m));
}

function updateCours($id, $post)
{
    $n = $post['nom'];
    $p = $post['prenom'];
    $m = $post['mail'];
    $c = $post['mdp'];
    $bddPDO = connexionBDD();
    $requete = "UPDATE cours SET code=?, titre=?, language=? WHERE id=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($n, $p, $m, $c, $id));
}

function supprimeCours($id)
{
    $bddPDO = connexionBDD();
    $requete = "DELETE FROM cours WHERE id=?";
    $stmt = $bddPDO->prepare($requete);
    $stmt->execute(array($id));
}
