<?php
require_once 'src/view/header.php';
?>

<section>
    <?php
    foreach ($films as $film) { ?>
        <div class="films">
            <h1>
                <?= $film->getName() ?>
            </h1>

            <a href="film/<?= $film->getId() ?>"><img src="http://localhost/cinemamvc/public/<?= $film->getAffiche() ?>"
                    width='175px' height='250px'></a>
            <a href="updatefilm/<?= $film->getId() ?>"> modifier </a>
            <a href="deletefilm/<?= $film->getId() ?>"> supprimer </a>
            <a href="addActorToFilm/<?= $film->getId() ?>"> ajouter un acteur </a>
        </div>


    <?php } ?>
</section>
</body>