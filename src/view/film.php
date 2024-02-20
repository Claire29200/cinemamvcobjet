<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film by Id</title>
</head>
<body>
<h1>   <?= $film->getName() ?>
        <?= $film->getDate() ?></h1>
     
       <a href="film/<?= $film->getId() ?>"><img src="http://localhost/cinemamvc/public/<?= $film->getAffiche() ?>"
            width='175px' height='250px'></a>

    <h1>réalisé par :
        <?= $film->getRealisateur()->getNom() ?>
        <?= $film->getRealisateur()->getPrenom() ?>

    </h1>


    <h1>les acteurs principaux:</h1>

    <?php
    foreach ($film->getActeurs() as $a) { ?>
        <div class="films">
            <h1>
                <?= $a->getNom() ?>
                <?= $a->getPrenom() ?>
            </h1>

            <a href="film/<?= $film->getId() ?>"><img src="http://localhost/cine/public/<?= $film->getActeurs() ?>"
                    width='175px' height='250px'></a>
        </div>
    <?php }
    ?>
    <h1>genre:
        <?= $film->getGenre()->getGenre() ?>
    </h1>
    <h1>date de sortie:
        <?= $film->getDate() ?>
    </h1>

</section>
</body>
</html>