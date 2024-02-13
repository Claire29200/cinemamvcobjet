<?php 
foreach ($realisateurs as $realisateur) { ?>
     <h1>   <?= $realisateur->getFirstName() ?>
        <?= $realisateur->getLastName() ?></h1>
       <p><img src="<?= $realisateur->getPhoto() ?>" /></p>
<?php }


?>