<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Modifier un cours</h1>
    <form action="../../controllerCours/modifCours/<?= $result['id'] ?>" method="POST">
        <input type="text" name="code" placeholder="Code" value=<?= $result['code'] ?>><br><br>
        <input type="text" name="titre" placeholder="Titre" value=<?= $result['titre'] ?>><br><br>
        <input type="text" name="language" placeholder="Language" value=<?= $result['language'] ?>><br><br>
        <input type="submit" value="Valider">
    </form>
</body>

</html>
