<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <form action="<?= _URL_LOGIN ?>" method="POST">
        <input type="text" name="mail" placeholder="E-Mail"><br><br>
        <input type="password" name="mdp" placeholder="Mot de Passe"><br><br>
        <input type="submit" value="Connexion">
        <a href="<?= _URL_REGISTER ?>" value="S'enregistrer">
            <btn>S'enregistrer</btn>
        </a>
    </form>
</body>

</html>
