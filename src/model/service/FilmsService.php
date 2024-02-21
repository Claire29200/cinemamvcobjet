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
         //var_dump($acteur); die();
            $film->addActeur($acteur);  // fonction ajoute 1 acteur à l'objet movie (voire classe/entité Movie)
            

        }
        
        
        $genres = $this->genresDao->findByMovie($id); // recherche du genre 
        $film->setGenre($genre);
   
        
        $realisateur = $this->realisateursDao->findByMovie($id);
        $film->setRealisateur($realisateur);
       /* $comments = $this->commentDao->findByMovie($id);*/
        return $film;
    }
    public function create($filmData)
    {
        $films = $this->filmsDao->createObjectFromFields($filmData);
        $genre = $this->genresDao->findById($filmData["id_genre"]);
        $film->setGenre($genre);
        $real = $this->realisateursDao->findById($filmData["id_realisateur"]);
        $film->setRealisateur($real);
        $this->filmsDao->create($film);
    }

    public function update($filmData)
    {
        $film = $this->filmDao->createObjectFromFields($filmData);
        $genre = $this->genreDao->findById($filmData["id_genre"]);
        $film->setGenre($genre);
        $real = $this->realisateurDao->findById($filmData["id_realisateur"]);
        $film->setRealisateur($real);
        $this->filmsDao->update($film);
    }

    public function addActorToFilm($lepost)
    {
        $acteur = $this->actorDao->findById($lepost['id_acteur']);
        $film = $this->getOneFilm($lepost['id_film']);
        $this->filmsDao->addActorToFilm($acteur, $film);
    }
    public function deletefilm($filmId)
    {
        $film = $this->getOneFilm($filmId);
        $this->filmsDao->delete($film);
    }
}
    