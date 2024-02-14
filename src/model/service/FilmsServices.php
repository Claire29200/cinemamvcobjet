<?php

namespace cinemamvcobjet\model\service;

use cinemamvcobjet\model\entities\Acteurs;
use cinemamvcobjet\model\entities\Genres;
use cinemamvcobjet\model\entities\Films;
use cinemamvcobjet\model\entities\Realisateurs;

class FilmsService
{
    private $movieDao;
    private $actorDao;
    private $genreDao;
    private $Dao;

    public function __construct()
    {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->directorDao = new DirectorDao();
        $this->genreDao = new GenreDao();
    }

    public function getbyId($id)
    {     
        // creation de l'objet movie référencé par $movie.
        $movie = $this->movieDao->findById($id);  // recherche dans movieDao ( $id = id du movie )
       // renvoi de laliste des objets actors.
        $actors = $this->actorDao->findByMovie($id); // recherche des acteurs pour 1 film 
        foreach ($actors as $actor) {
            // fonction dans la classe Movie sans Entities
            $movie->addActor($actor);  // fonction ajoute 1 acteur à l'objet movie (voire classe/entité Movie)
        }

        $genre = $this->genreDao->findByMovie($id); // recherche du genre 
        $movie->setGenre($genre);
        $director = $this->directorDao->findByMovie($id);
        $movie->setDirector($director);
        print_r($movie);
       /* $comments = $this->commentDao->findByMovie($id);*/
        return $movie;
    }



    //
    // on a tout ce qu'il faut pour créer l'objet.
    //
    public function create($movieData)
    {
        $movie = $this->movieDao->createObjectFromFields($movieData);
        $genre = $this->genreDao->findById($movieData['genre']);
        $movie->setGenre($genre);

        $director = $this->directorDao->findById($movieData['director']);
        $movie->setDirector($director);

        $this->movieDao->create($movie);
    }


    public function update($id,$movieData)
    {
        $movie = $this->movieDao->createObjectFromFields($movieData);
          
        $genre = $this->genreDao->findById($movieData['genre']);
        $movie->setGenre($genre);

        $director = $this->directorDao->findById($movieData['director']);
        $movie->setDirector($director);

        $this->movieDao->update($id,$movie);
    }

    public function addActorToFilm($lepost) {
     //  $lepost recupère [  'movieId' => 1 ,'actorId' => 6 ]

        $movie = $this->movieDao->findById($lepost['movieId']); 
        $actor = $this->actorDao->findById($lepost['actorId']); 
        
        $this->movieDao->addActorToFilm( $movie , $actor );
        
    }

}