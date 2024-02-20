<?php
require_once 'src/view/header.php';
?>
<section>
    <?php
    foreach ($realisateurs as $realisateur) { ?>

        <div class="realisateurs">

            <h1>
                <?= $realisateur->getNom() ?>
                <?= $realisateur->getPrenom() ?>
            </h1>

            <a href="realisateur/<?= $realisateur->getId() ?>"><img src="http://localhost/cinemamvcobjet/public/<?= $realisateur->getPhoto() ?>"
                    width='175px' height='250px'></a>
            <a href="updaterealisateur/<?= $realisateur->getId() ?>"> modifier </a>
            <a href="deleterealisateur/<?= $realisateur->getId() ?>"> supprimer </a>
            

        </div>

    <?php } ?>
</section>
