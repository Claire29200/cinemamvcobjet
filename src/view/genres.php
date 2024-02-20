<?php
require 'src/view/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres </title>
</head>

<body>
    <?php
    foreach ($genres as $genre) { ?>
        <li>
            <?= $genre->getGenre() ?>

        </li>
    <?php } ?>
</body>

</html>
