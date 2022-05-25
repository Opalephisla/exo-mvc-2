<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Liste des cours</h1>
    <ul>
        <?php
        foreach ($result as $value) { ?>
            <li><?= $value['titre'] ?> <?= $value['language'] ?>
                <a href='controllerCours/afficheModifCours/<?= $value["id"] ?>'>Modifier</a>
                <a href='controllerCours/afficheDeleteCours/<?= $value["id"] ?>'>Supprimer</a>
            </li>
        <?php }
        ?>
    </ul>

</body>

</html>
