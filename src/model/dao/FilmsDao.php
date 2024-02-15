<?php



namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\Films;


class FilmsDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM Film ");
        $res = $stmt->execute();
       
        if ($res) {
            $Films = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                
                $Films[] = $this->createObjectFromFields($row);
            }
           // print_r ($Films);die();
            return $Films;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields)
    {  
        $genres = new Genres();

        $genres->setId($fields['id_film'])
              ->setName($fields['nom'])
              ->setDate($field['date_de_sortie'])
              ->setAffiche($field['affiche']) ;
            
                   

        return $genres;
    }
}


?>