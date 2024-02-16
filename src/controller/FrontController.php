<?php

namespace cinemamvcobjet\controller;

use cinemamvcobjet\model\service\FilmsService; 
use cinemamvcobjet\model\service\ActeursService; 
use cinemamvcobjet\model\service\RealisateursService; 
use cinemamvcobjet\model\service\GenresService; 


class FrontController
{
   private $filmsService;
   private $acteursService;  
   private $realisateursService; 
   private $genresService ;
    
   public function __construct() {
         $this->filmsService = new FilmsService(); 
         $this->acteursService = new ActeursService(); 
      
         $this->realisateursService = new RealisateursService();
         $this->genresService = new GenresService();    
    }

    public function acteurs()
    {
       $acteurs = $this->acteursService->getAllActors();
       echo '<pre>';
      // print_r($acteurs);
       require('./src/view/acteurs.php');
    }

    public function acteur($id)
    {
       $acteur = $this->acteursService->getById($id);
       echo '<pre>';
       require('./src/view/acteur.php');
       //print_r($acteur);
    }


    
    public function realisateurs()
    {
       $realisateurs = $this->realisateursService->getAllRealisateurs();
       echo '<pre>';
       require('./src/view/realisateurs.php');
       //print_r($realisateurs);
    }

    public function realisateur($id)
    {
       $realisateur = $this->realisateursService->getById($id);
       echo '<pre>';
       require('./src/view/realisateur.php');
      // print_r($realisateur);
    }

    public function addgenre() {
      // echo $this->twig->render('addgenre.html.twig'); 
      require ('./src/view/f_genre.php'); // formulaire de creation de genre.
   }

   
   public function genres()
   {
      $genres = $this->genresService->getAllGenres();
      echo '<pre>';
      require('./src/view/genres.php');
      //print_r($genres);
   }

   public function genre($id)
   {
      $genre = $this->genresService->getById($id);
      echo '<pre>';
      require('./src/view/genre.php');
     // print_r($genre);
   }

   public function films(){
      $films = $this->filmsService->getAllFilms();
      
      require('./src/view/films.php');
     
   }

   public function film($id){
      $film = $this->filmsService->getById($id);
      echo '<pre>';
      require('./src/view/film.php');
   }
}

?>