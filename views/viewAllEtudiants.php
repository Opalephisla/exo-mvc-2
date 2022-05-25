<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Liste des étudiants</h1>
    <ul>
        <?php
        foreach ($result as $value) { ?>
            <li><?= $value['nom'] ?> <?= $value['prenom'] ?>
                <a href='controllerEtudiant/afficheModifEtudiant/<?= $value["id"] ?>'>Modifier</a>
                <a href='controllerEtudiant/afficheDeleteEtudiant/<?= $value["id"] ?>'>Supprimer</a>
            </li>
        <?php }
        ?>
    </ul>

</body>

</html>
