<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Index de cinemamvcobjet</title>
   <style>
      img {
         max-width: 200px;
      }
      
      </style>
</head>
<body>
   
<?php 
require_once "vendor/autoload.php";

use cinemamvcobjet\controller\FrontController; 

$fc = new FrontController(); 
$base  = dirname($_SERVER['PHP_SELF']);

if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}


$route = new \Klein\Klein();

$route->respond('GET','/acteurs', function() use($fc) {
   $fc->acteurs(); 
});

$route->respond('GET','/acteur/[:id]', function($request,$response) use($fc) {
  
    $fc->acteur($request->id); 
 });

 $route->respond('GET','/realisateurs', function() use($fc) {
    $fc->realisateurs(); 
 });
 
 $route->respond('GET','/realisateur/[:id]', function($request,$response) use($fc) {
   
     $fc->realisateur($request->id); 
  });

  $route->respond('GET','/genres', function() use($fc) {
   $fc->genres(); 
});

$route->respond('GET','/genre/[:id]', function($request,$response) use($fc) {
  
    $fc->genre($request->id); 
 });

$route->dispatch();

?>


</body>
</html>
