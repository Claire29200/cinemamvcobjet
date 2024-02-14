<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film by Id</title>
</head>
<body>
<h1>   <?= $film->getName() ?>
        <?= $realisateur->getDateDeSortie() ?></h1>
       <p><img src="<?= $realisateur->getAffiche() ?>" /></p>
</body>
</html>