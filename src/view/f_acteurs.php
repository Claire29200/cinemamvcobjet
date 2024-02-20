<?php
require 'src/view/header.php';
?>

<form action="addacteur" method="POST">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="text" name="photo" placeholder="photo">
    <input type="submit" value="ajouter">
</form>