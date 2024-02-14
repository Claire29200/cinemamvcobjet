<?php

namespace cinemamvcobjet\model\entities;

class Film 
{
    private $id_film;
    private $date_de_sortie;
    private $affiche;
    private $genre;
    private $realisateur;
    private $acteurs ;


      public function setId_film(int $id_film )
    {   $this->id_film = $id_film; 
    return $this;}


    public function setGenre($genre) {
        $this->genre = $genre;
        return $this;
    }

    public function setRealisateur($real) {
        $this->realisateur = $real;
        return $this;
    }

    public function addActeur($acteurs) {
        $this->acteurs[] = $acteur;
        return $this;
    }

}