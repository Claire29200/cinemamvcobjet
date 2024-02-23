
<?php 
require_once "vendor/autoload.php";

use cinemamvcobjet\controller\FrontController; 
use cinemamvcobjet\controller\BackController;

//composer require twig/twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/src/view');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
//$twig->addGlobal('session', $_SESSION);


$fc = new FrontController($twig);

$bc = new BackController();

 
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

 $route->respond('GET','/films', function() use($fc) {
   $fc->films(); 
});

$route->respond('GET','/film/[:id]', function($request,$response) use($fc) {
    $fc->film($request->id); 
 });




$route->respond('GET', '/addgenre', function () use ($fc) {
   $fc->addgenre();  // affichage d'un formulaire de creation de genre
});

$route->respond('POST', '/addgenre', function ($request, $post) use ($bc) {
   //paramPost recupere les données du formulaire.
   $bc->addGenre($request->paramsPost());
});

$route->respond('GET', '/addacteur', function () use ($fc) {
   $fc->addActeur();  // affichage d'un formulaire de creation de l'acteur
});

$route->respond('POST', '/addacteur', function ($request, $response) use ($bc) {
   //paramsPost recupere les données du formulaire.
   $bc->addActeur($request->paramsPost()); // envoi $_POST au controller par la fonction addacteur
   $response->redirect('acteurs')->send();
});

$route->respond('POST', '/updateacteur', function ($request, $response) use ($bc) {
   //paramsPost recupere les données du formulaire.
   $bc->updateActeur($request->paramsPost()); // envoi $_POST au controller par la fonction addacteur
   $response->redirect('acteurs')->send();
});

$route->respond('GET', '/addrealisateur', function () use ($fc) {
   $fc->addrealisateur();  // affichage d'un formulaire de creation de réalisateur
});

$route->respond('POST', '/addrealisateur', function ($request) use ($bc) {
   //paramsPost recupere les données du formulaire.
   $bc->addRealisateur($request->paramsPost());
});

$route->respond('GET', '/addfilm', function () use ($fc) {
   $fc->addfilm();  // affichage d'un formulaire de creation du film
});

$route->respond('POST', '/addfilm', function ($request, $response) use ($bc) {
   //paramsPost recupere les données du formulaire.
   $bc->addFilm($request->paramsPost());
   $response->send('ok');
});
$route->respond('GET', '/updatefilm/[:id]', function ($request) use ($fc) {
   $fc->updatefilm($request->id);  // affichage d'un formulaire de creation du film
});
$route->respond('POST', '/updatefilm', function ($request, $response) use ($bc) {
   $bc->updatefilm($request->paramsPost());
});
$route->respond('GET', '/addActeurToFilm/[:id]', function ($request) use ($fc) {
   $fc->addActorToFilm($request->id);
});

$route->respond('POST', '/addActeurToFilm', function ($request, $response) use ($bc) {
   $bc->addActorToFilm($request->paramsPost());
});

$route->respond('GET', '/deletefilm/[:id]', function ($request, $response) use ($bc) {
   $bc->deletefilm($request->id);
});

$route->respond('GET', '/inscription', function ($request) use ($fc) {
   $fc->inscription();
});
$route->respond('GET', '/connexion', function ($request) use ($fc) {
   $fc->connexion();
});

$route->dispatch();

?>


</body>
</html>
