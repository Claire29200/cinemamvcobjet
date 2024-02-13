<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acteurs</title>
</head>
<body>
<h1>   <?= $acteur->getFirstName() ?>
        <?= $acteur->getLastName() ?></h1>
       <p><img src="<?= $acteur->getPhoto() ?>" /></p>
</body>
</html>