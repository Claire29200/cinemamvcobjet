<?php

namespace cinemamvcobjet\controller;

use cinemamvcobjet\model\service\FilmsService; 
use cinemamvcobjet\model\service\ActeursService; 
use cinemamvcobjet\model\service\RealisateursService; 
use cinemamvcobjet\model\service\GenresService; 

use Twig\Environment;

class FrontController
{
   private $filmsService;
   private $acteursService;  
   private $realisateursService; 
   private $genresService ;
   private $twig;
    
   public function __construct($twig) {
         $this->filmsService = new FilmsService(); 
         $this->acteursService = new ActeursService(); 
      
         $this->realisateursService = new RealisateursService();
         $this->genresService = new GenresService();  
         $this->twig = $twig;  
    }

    public function acteurs()
    {
       $acteurs = $this->acteursService->getAllActors();
       
        // require('./src/view/actors.php'); // formulaire du creation 
        echo $this->twig->render('acteurs.twig', ["acteurs" => $acteurs]);
    }


    public function acteur($id)
    {
       $acteur = $this->acteursService->getById($id);
       echo $this->twig->render('acteur.twig', ["acteur" => $acteur]);
    }


    
    public function realisateurs()
    {
      $realisateurs = $this->realisateursService->getAllRealisateurs();
      // echo "<pre>";
      // print_r($realisateurs);
      // require('./src/view/realisateurs.php'); // formulaire du creation 

      echo $this->twig->render('realisateurs.twig', ["realisateurs" => $realisateurs]);
  }
    

    public function realisateur($id)
    {
       $realisateur = $this->realisateursService->getById($id);
       // echo "<pre>";
        // print_r($realisateur);
        echo $this->twig->render('realisateur.twig', ["realisateur" => $realisateur]);
    }

    public function addgenre()
    {
        echo $this->twig->render('addgenre.twig');
        // require './src/view/f_genre.php'; // formulaire de creation de genre.
    }
   
   public function genres()
    {
        $genres = $this->genresService->getAllGenres();

        // require('./src/view/genres.php'); // formulaire du creation 

        echo $this->twig->render('genres.twig', ["genres" => $genres]);
    }
   public function genre($id)
   {
      $genre = $this->genresService->getById($id);
      echo '<pre>';
      //require('./src/view/genre.php');
     // print_r($genre);
   }

   public function films(){
      $films = $this->filmsService->getAllFilms();
      
     // require('./src/view/films.php');
     echo $this->twig->render('films.twig', ["films" => $films]);
   }

   public function film($id){
      $film = $this->filmsService->getById($id);
      //require('./src/view/film.php');

        echo $this->twig->render('film.twig', ["film" => $film]);

   }
   
   

   public function addacteur()
   {
       echo $this->twig->render('addacteur.twig');
       //require './src/view/f_acteur.php'; // formulaire de creation de l'acteur.
   }

   public function addrealisateur()
   {
       echo $this->twig->render('addrealisateur.twig');
       //require './src/view/f_realisateur.php'; // formulaire de creation du realisateur.
   }

   public function addfilm()
   {

       $genres = $this->genresService->getAllGenres();
       $realisateurs = $this->realisateursService->getAllRealisateurs();
       $acteurs = $this->acteursService->getAllActors();
       //require './src/view/f_film.php'; // formulaire de creation du film.
       echo $this->twig->render('f_film.twig', ["genres" => $genres, "realisateurs" => $realisateurs, "acteurs"=>$acteurs]);

   }

   public function updatefilm($id)
   {

       $genres = $this->genreService->getAllGenres();
       $realisateurs = $this->realisateurService->getAllRealisateurs();
       $film = $this->filmService->getOneFilm($id);
       //require './src/view/u_film.php'; // formulaire de creation du film.
       echo $this->twig->render('updatefilm.twig');

   }

   public function addActorToFilm($id)
   {
       $acteurs = $this->actorService->getAllActors();

       $film = $this->filmService->getOneFilm($id);
       $deja = $film->getActeurs();

       //require './src/view/fa_film.php';
       echo $this->twig->render('addactortofilm.twig');
   }

   public function inscription() {
    echo $this->twig->render('inscription.twig');
   }
   public function connexion() {
    echo $this->twig->render('connexion.twig');
   }
}

?>