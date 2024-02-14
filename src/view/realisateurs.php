<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Réalisateurs</title>
</head>
<body>
<?php 
foreach ($realisateurs as $realisateur) { ?>
     <h1>   <?= $realisateur->getFirstName() ?>
        <?= $realisateur->getLastName() ?></h1>
       <p><img src="<?= $realisateur->getPhoto() ?>" /></p>
<?php }


?>
</body>
</html>
