<?php

namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\Genres;


class GenresDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM genre ");
        $res = $stmt->execute();
       
        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                
                $genres[] = $this->createObjectFromFields($row);
            }
           // print_r ($genres);die();
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

   
    public function findById($id): Genres
    {
        $stmt = $this->db->prepare("SELECT * FROM genres WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
           
          return $this->createObjectFromFields($row);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findByMovie($movieId)
    {
        $stmt = $this->db->prepare("
            SELECT id_genre, nom_genre as nom
            FROM genre
            INNER JOIN films
            ON genre.id_genre = films.id_genre       
            
        ");

        $res = $stmt->execute([':id_genre' => $movieId]);

        if ($res) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Genres::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    
    
    public function createObjectFromFields($fields)
    {  
        $genres = new Genres();

        $genres->setId($fields['id_genre'])
              ->setName($fields['nom_genre']) ;
                   

        return $genres;
    }
}
?>