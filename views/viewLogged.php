<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Les cours où vous pouvez vous inscrire</h1>
    <?php if (isset($unRegisteredClass) && $unRegisteredClass != null) { ?>
        <?php
        foreach ($unRegisteredClass as $value) { ?>
            <ul>
                <li><?= $value["titre"] . " " . $value["language"] . " " . $value["code"] . " " ?> <a href="<?= _URL ?>/controllerRegister/modelAddRegistration/<?= $_SESSION["id"] ?>/<?= $value["id"] ?>">S'inscrire</a></li>
            </ul>

        <?php } ?>
    <?php } else { ?>
        <p>Vous êtes inscrit à tous les cours</p>
    <?php } ?>
    <h1>Les cours auxquels vous êtes déjà inscrit</h1>
    <?php if (isset($registeredClass) && $registeredClass != null) { ?>
        <?php
        foreach ($registeredClass as $value) { ?>
            <ul>
                <li><?= $value["titre"] . " " . $value["language"] . " " . $value["code"] . " " ?><a href="<?= _URL ?>/controllerRegister/modelRemoveRegistration/<?= $_SESSION["id"] ?>/<?= $value["id"] ?>">Se désinscrire</a></li>
            </ul>
        <?php } ?>
    <?php } else { ?>
        <p>Vous n'êtes inscrit à aucun cours</p>
    <?php } ?>
    <a href="<?= _URL_LOGOUT ?>">Se déconnecter</a>

</body>

</html>
