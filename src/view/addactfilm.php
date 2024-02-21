<h1> ajout acteur à  un film
  <?= $film['titre'] ?><br>
  choisir un acteur <br>
  <form action="../ajoutacteur" method="post">


    <select name="id_acteur">
      <?php
      foreach ($acteurs as $act) { ?>
        <option value=<?= $act['id_acteur'] ?>> <?= $act['nom'] ?> </option>
      <?php } ?>
    </select>

    <input type="hidden" name="id_film" value=<?= $film['id_film'] ?>>
    <input type="submit" value="envoi">

  </form>