<?php

namespace cinemamvcobjet\model\service;


use cinemamvcobjet\model\dao\ActeursDao;

class ActeursService{

    private $acteursDao;

    public function __construct()
    {
        $this->acteursDao = new ActeursDao();
    }

    public function getAllActors()
    {
        $acteurs = $this->acteursDao->findAll();
        return $acteurs;
    }

    public function getById($id)
    {
        $acteur = $this->acteursDao->findById($id);
        return $acteur;
    }
}
?>

