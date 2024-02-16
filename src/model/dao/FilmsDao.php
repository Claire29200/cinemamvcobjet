<?php



namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\Films;


class FilmsDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM films ");
        $res = $stmt->execute();
        $films = [];
        if ($res) {
            
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                
                $films[] = $this->createObjectFromFields($row);
            }
        
            return $films;
    
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id){
        $stmt = $this->db->prepare("SELECT * FROM films WHERE id_film = :id_film");
        $res = $stmt->execute(['id_film'=>$id]);
      
        if ($res) {
            
            $row = $stmt->fetch(\PDO::FETCH_ASSOC) ;
                
               return $this->createObjectFromFields($row);
    
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields)
    {  
        //var_dump($fields); die();
        $film = new Films();

        $film->setId_film($fields['id_film'])
              ->setName($fields['nom'])
              ->setDate($fields['date_de_sortie'])
              ->setAffiche($fields['affiche']) 
              ->setGenre($fields['id_genre'])
              ->setRealisateur($fields['id_realisateur']) ;    
             //var_dump($film);die();        
        return $film;
        
    }
}


?>