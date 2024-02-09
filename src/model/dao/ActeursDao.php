<?php

namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\Acteurs;


class ActeursDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM acteurs ");
        $res = $stmt->execute();
       
        if ($res) {
            $acteurs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                
                $acteurs[] = $this->createObjectFromFields($row);
            }
           // print_r ($acteurs);die();
            return $acteurs;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

   
    public function findById($id): Acteurs
    {
        $stmt = $this->db->prepare("SELECT * FROM acteurs WHERE id = :id");
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
            SELECT id, nom as nom, prenom as prenom
            FROM acteurs
            INNER JOIN films_acteurs ON films_acteurs.acteurs_id = acteurs_id         
            WHERE id_film = :idfilm
        ");

        $res = $stmt->execute([':idfilm' => $movieId]);

        if ($res) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Acteurs::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    
    
    public function createObjectFromFields($fields)
    {  
        $acteurs = new Acteurs();

        $acteurs->setId($fields['id']||null)
              ->setFirstName($fields['nom']) 
              ->setLastName($fields['prenom'])
              ->setPhoto($fields['photo']) ;      

        return $acteurs;
    }
}
?>