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
    
    public function create($acteurData)
    {
        $acteur = $this->acteursDao->createObjectFromFields($acteurData);
        $this->acteursDao->create($acteur);
    }
    public function update($acteurData)
    {
        $acteur = $this->acteursDao->createObjectFromFields($acteurData);
        $this->acteursDao->update($acteur);
    }

    public function delete($acteursData)
    {
        $acteur = $this->acteursDao->findById($id);
        $this->acteursDao->delete($acteur);
    }

}
?>

