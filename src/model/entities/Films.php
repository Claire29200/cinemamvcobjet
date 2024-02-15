<?php

namespace cinemamvcobjet\model\entities;

class Films 
{
    private $id_film;
    private $nom;
    private $date_de_sortie;
    private $affiche;
    private $genre;
    private $realisateur;
    private $acteurs ;


    public function setId_film(int $id_film)
    {   $this->id_film = $id_film; 
    return $this;
}

    public function setName($nom)
    {   
        $this->id_film = $nom; 
        return $this;
    }

    public function getName() {
        return $this->nom;
    }

    public function getDate() {
        return $this->date_de_sortie;
    }

    public function setDate($d)
    {   
        $this->date_de_sortie = $d; 
        return $this;
    }

   


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