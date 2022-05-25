<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Modifier un profil</h1>
    <form action="../../controllerEtudiant/modifEtudiant/<?= $result['id'] ?>" method="POST">
        <input type="text" name="nom" placeholder="Nom" value=<?= $result['nom'] ?>><br><br>
        <input type="text" name="prenom" placeholder="Prénom" value=<?= $result['prenom'] ?>><br><br>
        <input type="text" name="mail" placeholder="E-Mail" value=<?= $result['email'] ?>><br><br>
        <input type="text" name="mdp" placeholder="Mot de Passe" value=<?= $result['mdp'] ?>><br><br>
        <input type="submit" value="Valider">
    </form>
</body>

</html>
