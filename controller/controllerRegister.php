<?php
session_start();
require_once("models/model.php");

function getRegisteredClass($idStudent)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM inscription INNER JOIN cours ON cours.id = inscription.id_cours WHERE :idStudent = id_etudiant";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idStudent', $idStudent);
    $sth->execute();
    $data = $sth->fetchAll();
    return $data;
}

function getUnregisteredClass($idStudent)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM cours LEFT JOIN inscription ON cours.id = inscription.id_cours AND inscription.id_etudiant = :idStudent WHERE inscription.id_etudiant IS NULL";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idStudent', $idStudent);
    $sth->execute();
    $data = $sth->fetchAll();
    return $data;
}

function modelAddRegistration($idStudent, $idClass)
{
    $pdo = connexionBDD();
    // check if the student is the current user
    $sql = "SELECT * FROM etudiant WHERE id=:idStudent";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idStudent', $idStudent);
    $sth->execute();
    $data = $sth->fetch();
    if ($data['id'] == $_SESSION['id']) {
        $sql = "INSERT INTO inscription (id_etudiant, id_cours) VALUES (:idStudent, :idClass)";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':idStudent', $idStudent);
        $sth->bindParam(':idClass', $idClass);
        $sth->execute();
        $registeredClass = getRegisteredClass($_SESSION["id"]);
        $unRegisteredClass = getUnregisteredClass($_SESSION["id"]);
        require("views/viewLogged.php");
    }
}

function modelRemoveRegistration($idStudent, $idClass)
{
    $pdo = connexionBDD();
    // check if the student is the current user
    $sql = "SELECT * FROM etudiant WHERE id=:idStudent";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idStudent', $idStudent);
    $sth->execute();
    $data = $sth->fetch();
    if ($data['id'] == $_SESSION['id']) {
        $sql = "DELETE FROM inscription WHERE id_etudiant=:idStudent AND id_cours=:idClass";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':idStudent', $idStudent);
        $sth->bindParam(':idClass', $idClass);
        $sth->execute();
        $registeredClass = getRegisteredClass($_SESSION["id"]);
        $unRegisteredClass = getUnregisteredClass($_SESSION["id"]);
        require("views/viewLogged.php");
    } elseif ($data['id'] != $_SESSION['id']) {
        require("views/viewLogged.php");
        echo "<br><br>Vous tentez de modifier l'accès un cours qui ne vous appartient pas";
    } else {
        echo "Vous n'êtes pas connecté";
        require("views/viewSignIn.php");
    }
}
