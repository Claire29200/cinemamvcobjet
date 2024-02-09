<?php

namespace cinemamvcobjet\model\entities;

class Realisateurs
{
    private int $id;
    private string $realisateurs_nom;
    private string $realisateurs_prenom;
    private string $realisateurs_photo;




    public function setId(int $id = null)
    {
        $this->id = $id;
        return $this;
    }

    public function setFirstName(string $realisateurs_nom)
    {
        $this->realisateurs_nom = $realisateurs_nom;
        return $this;
    }

    public function setLastName(string $realisateurs_prenom)
    {
        $this->realisateurs_prenom = $realisateurs_prenom;
        return $this;
    }

    public function setPhoto(string $realisateurs_photo)
    {
        $this->realisateurs_photo = $realisateurs_photo;
        return $this;
    }


    public function getId() : int
    {
        return $this->id;
    }

    public function getFirstName() : string
    {
        return $this->realisateurs_nom;
    }

    public function getLastName() : string
    {
        return $this->realisateurs_prenom;
    }

    public function getPhoto() : string
    {
        return $this->realisateurs_photo;
    }
}