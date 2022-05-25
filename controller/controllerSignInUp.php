<?php
require_once("models/model.php");
require_once("controller/controllerRegister.php");

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

function modelLogged()
{
    $registeredClass = getRegisteredClass($_SESSION["id"]);
    $unRegisteredClass = getUnregisteredClass($_SESSION["id"]);
    $result = login($_POST);
    require  "views/viewLogged.php";
    echo "<div> <h1> Connecté en tant que " . $result["nom"] . " " . $result["prenom"] . "</h1> </div>";
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

function modelLogout()
{
    session_destroy();
    require("views/viewSignin.php");
    echo "<br>Vous avez été déconnecté";
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
