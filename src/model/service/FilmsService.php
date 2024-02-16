<?php

namespace cinemamvcobjet\model\service;

use cinemamvcobjet\model\dao\FilmsDao; 
use cinemamvcobjet\model\dao\ActeursDao; 
use cinemamvcobjet\model\dao\GenresDao; 
use cinemamvcobjet\model\dao\RealisateursDao; 


class FilmsService
{
    private $filmsDao;
    private $acteursDao;
    private $genresDao;
    private $realisateursDao;
  
    public function __construct()
    {
        $this->filmsDao = new FilmsDao();
        $this->acteursDao = new ActeursDao();
        $this->realisateursDao = new RealisateursDao();
        $this->genresDao = new GenresDao();
    }

    public function getAllFilms() {
      $films = $this->filmsDao->findAll();
      return $films;
    }

    public function getbyId($id)
    {     
        // creation de l'objet movie référencé par $movie.
        $film = $this->filmsDao->findById($id);  // recherche dans movieDao ( $id = id du movie )
       // renvoi de la liste des objets actors.
        $acteurs = $this->acteursDao->findByMovie($id); // recherche des acteurs pour 1 film 
   
        // var_dump(get_class_methods($film));die();
        foreach ($acteurs as $acteur) {
            // fonction dans la classe Movie sans Entities
         
            $film->addActeur($acteur);  // fonction ajoute 1 acteur à l'objet movie (voire classe/entité Movie)

        }
        
        
        $genre = $this->genresDao->findByMovie($id); // recherche du genre 
        $film->setGenre($genre);
   
        
        $realisateur = $this->realisateursDao->findByMovie($id);
        $film->setRealisateur($realisateur);
       /* $comments = $this->commentDao->findByMovie($id);*/
        return $film;
    }

    //
    // on a tout ce qu'il faut pour créer l'objet.
    //
    // public function create($movieData)
    // {
    //     $movie = $this->movieDao->createObjectFromFields($movieData);
    //     $genre = $this->genreDao->findById($movieData['genre']);
    //     $movie->setGenre($genre);

    //     $director = $this->directorDao->findById($movieData['director']);
    //     $movie->setDirector($director);

    //     $this->movieDao->create($movie);
    // }


    // public function update($id,$movieData)
    // {
    //     $movie = $this->movieDao->createObjectFromFields($movieData);
          
    //     $genre = $this->genreDao->findById($movieData['genre']);
    //     $movie->setGenre($genre);

    //     $director = $this->directorDao->findById($movieData['director']);
    //     $movie->setDirector($director);

    //     $this->movieDao->update($id,$movie);
    // }

    // public function addActorToFilm($lepost) {
    //  //  $lepost recupère [  'movieId' => 1 ,'actorId' => 6 ]

    //     $movie = $this->movieDao->findById($lepost['movieId']); 
    //     $actor = $this->actorDao->findById($lepost['actorId']); 
        
    //     $this->movieDao->addActorToFilm( $movie , $actor );
        
    // }

}