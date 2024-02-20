<?php

namespace cinemamvcobjet\model\service;


use cinemamvcobjet\model\dao\RealisateursDao;

class RealisateursService{

    private $realisateursDao;

    public function __construct()
    {
        $this->realisateursDao = new RealisateursDao();
    }

    public function getAllRealisateurs()
    {
        $realisateurs = $this->realisateursDao->findAll();
        return $realisateurs;
    }

    public function getById($id)
    {
        $realisateur = $this->realisateursDao->findById($id);
        return $realisateur;
    }
    public function create($realisateurData)
    {
        $realisateur = $this->realisateursDao->createObjectFromFields($realisateurData);
        $this->realisateursDao->create($realisateur);
    }
}
?>

