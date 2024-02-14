<?php

namespace cinemamvcobjet\model\service;


use cinemamvcobjet\model\dao\GenresDao;

class GenresService{

    private $genresDao;

    public function __construct()
    {
        $this->genresDao = new GenresDao();
    }

    public function getAllGenres()
    {
        $genres = $this->genresDao->findAll();
        return $genres;
    }

    public function getById($id)
    {
        $genre = $this->genresDao->findById($id);
        return $genre;
    }
}
?>
