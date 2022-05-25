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

function login($form)
{
    $email = $form["mail"];
    $mdp = $form["mdp"];
    $hashed = hash('sha256', $mdp);
    $pdo = connexionBDD();
    $sql = "SELECT * FROM etudiant WHERE email=? AND mdp=?";
    $sth = $pdo->prepare($sql);
    $sth->execute(array($email, $hashed));
    $data = $sth->fetch();
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
    $sql = "INSERT INTO inscription (id_etudiant, id_cours) VALUES (:idStudent, :idClass)";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idStudent', $idStudent);
    $sth->bindParam(':idClass', $idClass);
    $sth->execute();
    $registeredClass = getRegisteredClass($_SESSION["id"]);
    $unRegisteredClass = getUnregisteredClass($_SESSION["id"]);
    require("views/viewLogged.php");
}

function modelRemoveRegistration($idStudent, $idClass)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM inscription WHERE id_etudiant = :idStudent AND id_cours = :idClass";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idStudent', $idStudent);
    $sth->bindParam(':idClass', $idClass);
    $sth->execute();
    $registeredClass = getRegisteredClass($_SESSION["id"]);
    $unRegisteredClass = getUnregisteredClass($_SESSION["id"]);
    require("views/viewLogged.php");
}

function modelLogged()
{
    $registeredClass = getRegisteredClass($_SESSION["id"]);
    $unRegisteredClass = getUnregisteredClass($_SESSION["id"]);
    require  "views/viewLogged.php";
}

function modelLogout()
{
    session_destroy();
    require("views/viewSignin.php");
}

function modelLogin()
{
    $result = login($_POST);
    if ($result) {
        $_SESSION["id"] = $result["id"];
        modelLogged();
    } else {
        require("views/viewSignIn.php");
        echo "<br>Mauvais identifiant ou mot de passe";
    }
}

function register($form)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO etudiant (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
    $sql2 = "SELECT * FROM etudiant WHERE email=?";
    $sth2 = $pdo->prepare($sql2);
    $sth2->execute(array($form["mail"]));
    $data = $sth2->fetch();
    if ($data) {
        require("views/viewAddEtudiant.php");
        echo "<br>Cet email est déjà utilisé";
    } else {
        $hashed = hash('sha256', $form["mdp"]);
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':nom', $form["nom"]);
        $sth->bindParam(':prenom', $form["prenom"]);
        $sth->bindParam(':email', $form["mail"]);
        $sth->bindParam(':mdp', $hashed);
        $sth->execute();
        require("views/viewSignIn.php");
        echo "<br>Vous êtes inscrit";
    }
}

function modelRegister()
{
    $result = register($_POST);
    if ($result) {
        require("views/viewSignIn.php");
    }
}
