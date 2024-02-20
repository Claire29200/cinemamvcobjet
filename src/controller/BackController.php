<?php

namespace cinemamvcobjet\controller;

use cinemamvcobjet\model\service\FilmsService; 
use cinemamvcobjet\model\service\ActeursService; 
use cinemamvcobjet\model\service\RealisateursService; 
use cinemamvcobjet\model\service\GenresService; 

class BackController
{

    private $acteurService;
    private $realisateurService;

    private $filmService;

    private $genreService;

    public function __construct()
    {
        $this->acteurService = new ActeursService();
        $this->realisateurService = new RealisateursService();
        $this->filmService = new FilmsService();
        $this->genreService = new GenresService();
    }


    public function addgenre($genreData)
    {
        $this->genreService->create($genreData);
    }

    public function addacteur($acteurData)
    {
        $this->actorService->create($acteurData);
    }
    public function addrealisateur($realisateurData)
    {
        $this->realisateurService->create($realisateurData);
    }

    public function addfilm($filmData)
    {

        $this->filmService->create($filmData);
    }
    public function updatefilm($filmData)
    {
        $this->filmService->update($filmData);
    }
    public function deletefilm($filmId)
    {
        $this->filmService->deletefilm($filmId);

    }
    public function addActeurToFilm($lepost)
    {
        $this->filmService->addActeurToFilm($lepost);
    }
}