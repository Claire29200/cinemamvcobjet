<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Films</title>
</head>
<body>
<?php 
foreach ($films as $film) { ?>
     <h1>   <?= $film->getName() ?>
        <?= $film->getDateDeSortie() ?></h1>
       <p><img src="<?= $film->getAffiche() ?>" /></p>
<?php }


?>
</body>
</html>