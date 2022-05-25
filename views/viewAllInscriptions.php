<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Liste des inscriptions</h1>
    <ul>
        <?php
        foreach ($result as $value) { ?>
            <li><?= $value['id_etudiant'] ?> <?= $value['id_cours'] ?>
                <a href='controllerInscription/afficheModifInscription/<?= $value["id"] ?>'>Modifier</a>
                <a href='controllerInscription/afficheDeleteInscription/<?= $value["id"] ?>'>Supprimer</a>
            </li>
        <?php }
        ?>
    </ul>

</body>

</html>
