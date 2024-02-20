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
            SELECT realisateur.* 
            FROM realisateur
            INNER JOIN films ON films.id_realisateur = realisateur.id         
            WHERE films.id_film = :idfilm
        ");

        $res = $stmt->execute([':idfilm' => $movieId]);

        if ($res) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
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
    public function create(Realisateurs $realisateur)
    {
        $stmt = $this->db->prepare("INSERT INTO realisateur (nom,prenom, photo) VALUES(:nom,:prenom, :photo)");
        $res = $stmt->execute
        ([
                ':nom' => $realisateur->getNom(),
                ':prenom' => $realisateur->getPrenom(),
                ':photo' => $realisateur->getPhoto(),
            ]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

}
?>