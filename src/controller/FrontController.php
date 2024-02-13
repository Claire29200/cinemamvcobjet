<?php

namespace cinemamvcobjet\controller;


use cinemamvcobjet\model\service\ActeursService; 
use cinemamvcobjet\model\service\RealisateursService; 

class FrontController
{
      
     private $acteursService, $realisateursService  ;
    
     public function __construct(){
         $this->acteursService = new ActeursService(); 
         $this->realisateursService = new RealisateursService();     
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
       require('./src/view/acteurs.php');
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
       require('./src/view/realisateurs.php');
      // print_r($realisateur);
    }

    public function addgenre() {
      // echo $this->twig->render('addgenre.html.twig'); 
      require './src/view/f_genre.php'; // formulaire de creation de genre.
   }

   
}

?>