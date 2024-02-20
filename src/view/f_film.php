<?php
require 'src/view/header.php';
?>
<form action="addfilm" method="POST">
    <input type="text" name="titre" placeholder="titre">
    <input type="text" name="date_de_sortie" placeholder="date de sortie">
    <input type="text" name="une_affiche" placeholder="une affiche">

    <select name="id_genre">
        <option>choisir un genre</option>
        <?php
        foreach ($genres as $g) { ?>
            <option value=<?= $g->getId() ?>> <?= $g->getGenre() ?> </option>
        <?php } ?>
    </select>


    <select name="id_realisateur">
        <option>choisir un realisateur</option>
        <?php
        foreach ($realisateurs as $r) { ?>
            <option value=<?= $r->getId() ?>> <?= $r->getNom() ?>     <?= $r->getPrenom() ?> </option>
        <?php } ?>
    </select>



    <input type="submit" value="ajouter">
</form>