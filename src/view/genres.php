<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>genres</title>
   
</head>
<body>
<?php 
foreach ($genres as $genre) { ?>
     <h1>   <?= $genre->getName() ?></h1>
       
<?php }


?>
</body>
</html>
