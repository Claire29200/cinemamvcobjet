<?php

namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\Realisateurs;


class RealisateursDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM realisateur ");
        $res = $stmt->execute();
       
        if ($res) {
            $realisateurs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                
                $realisateurs[] = $this->createObjectFromFields($row);
            }
           // print_r ($realisateurs);die();
            return $realisateurs;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

   
    public function findById($id): Realisateurs
    {
        $stmt = $this->db->prepare("SELECT * FROM realisateur WHERE id = :id");
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
            FROM realisateur
            INNER JOIN films_realisateur ON films_realisateur.realisateur_id = realisateur_id         
            WHERE id_film = :idfilm
        ");

        $res = $stmt->execute([':idfilm' => $movieId]);

        if ($res) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Realisateurs::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    
    
    public function createObjectFromFields($fields)
    {  
        $realisateurs = new Realisateurs();

        $realisateurs->setId($fields['id'])
              ->setFirstName($fields['nom']) 
              ->setLastName($fields['prenom'])
              ->setPhoto($fields['photo']) ;      

        return $realisateurs;
    }
}
?>