<?php

namespace cinemamvcobjet\model\entities;

class Genres
{
    private int $id_genre;
    private string $nom_genres;


    public function setId(int $id_genre )
    {
        $this->id_genre = $id_genre;
        return $this;
    }

    public function setName(string $nom_genres)
    {
        $this->nom_genres = $nom_genres;
        return $this;
    }


    public function getId() : int
    {
        return $this->id_genre;
    }

    public function getName() : string
    {
        return $this->nom_genres;
    }

    
}