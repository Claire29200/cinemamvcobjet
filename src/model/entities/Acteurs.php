<?php

namespace cinemamvcobjet\model\entities;

class Acteurs
{
    private int $id;
    private string $acteurs_nom;
    private string $acteurs_prenom;
    private string $acteurs_photo;




    public function setId(int $id = null)
    {
        $this->id = $id;
        return $this;
    }

    public function setFirstName(string $acteurs_nom)
    {
        $this->acteurs_nom = $acteurs_nom;
        return $this;
    }

    public function setLastName(string $acteurs_prenom)
    {
        $this->acteurs_prenom = $acteurs_prenom;
        return $this;
    }

    public function setPhoto(string $acteurs_photo)
    {
        $this->acteurs_photo = $acteurs_photo;
        return $this;
    }


    public function getId() : int
    {
        return $this->id;
    }

    public function getFirstName() : string
    {
        return $this->acteurs_nom;
    }

    public function getLastName() : string
    {
        return $this->acteurs_prenom;
    }

    public function getPhoto() : string
    {
        return $this->acteurs_photo;
    }
}