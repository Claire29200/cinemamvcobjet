<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>acteurs</title>
   
</head>
<body>
<?php 
require_once 'src/view/header.php';
?>
<section>
   <?php  
foreach ($acteurs as $acteur) { ?>
<div class="acteurs">
   
     <h1>  
       <?= $acteur->getFirstName() ?>
        <?= $acteur->getLastName() ?>
      </h1>
      <a href="acteur/<?= $acteur->getId() ?>"><img src="<?= $acteur->getPhoto() ?>"
                    width='175px' height='250px'></a>
            <a href="updateacteur/<?= $acteur->getId() ?>"> modifier </a>
            <a href="deleteacteur/<?= $acteur->getId() ?>"> supprimer </a>
            

        </div>

       
<?php }?>

</section>
</body>
</html>
