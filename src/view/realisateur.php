<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realisateur by Id</title>
</head>
<body>
<h1>   <?= $realisateur->getFirstName() ?>
        <?= $realisateur->getLastName() ?></h1>
       <p><img src="<?= $realisateur->getPhoto() ?>" /></p>
</body>
</html>