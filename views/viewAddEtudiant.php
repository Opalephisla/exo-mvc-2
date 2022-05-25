<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>S'inscrire</h1>
    <form action="../controllerRegister/modelRegister" method="POST">
        <input type="text" name="nom" placeholder="Nom"><br><br>
        <input type="text" name="prenom" placeholder="Préom"><br><br>
        <input type="text" name="mail" placeholder="E-Mail"><br><br>
        <input type="text" name="mdp" placeholder="Mot de Passe"><br><br>
        <input type="submit" value="S'enregistrer">
        <a href="<?= _URL ?>/views/viewSignIn.php" value="Connexion">
            <btn>Connexion</btn>
        </a>
    </form>
</body>

</html>
