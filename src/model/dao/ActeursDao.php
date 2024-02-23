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
        SELECT * FROM `compose`,acteurs WHERE acteurs.id = compose.id_acteur AND compose.id_film = :idfilm;
        ");

        $res = $stmt->execute([':idfilm' => $movieId]);

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
    
    
    public function createObjectFromFields($fields)
    {  
        $acteurs = new Acteurs();

        $acteurs->setId($fields['id'])
              ->setFirstName($fields['nom']) 
              ->setLastName($fields['prenom'])
              ->setPhoto($fields['photo']) ;      
              
        return $acteurs;
    }
    
    public function create(Acteurs $acteurs)
    {
        $stmt = $this->db->prepare("INSERT INTO acteurs (nom,prenom,photo) VALUES(:nom, :prenom, :photo)");
        $res = $stmt->execute([
            ':nom' => $acteurs->getLastName(),
            ':prenom' => $acteurs->getFirstName(),
            ':photo' => $acteurs->getPhoto(),
        ]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    public function update(Acteurs $acteurs)
    {
        $stmt = $this->db->prepare('UPDATE acteurs SET nom=:nom,prenom=:prenom,photo=:photo,
WHERE acteurs.id_acteur= :id');
        $res = $stmt->execute(
            [
                ':id' => $acteurs->getId(),
                ':prenom' => $acteurs->getFirstName(),
                ':nom' => $acteurs->getLastName(),
                ':photo' => $acteurs->getPhoto(),
                

            ]
        );
        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    public function delete(Acteurs $acteurs)
    {
        $stmt = $this->db->prepare('DELETE FROM `acteurs` WHERE id = :idacteur;  DELETE from acteurs WHERE id=:idacteur');
        $res = $stmt->execute([

            ':idfilm' => $acteur->getId()
        ]);
        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }

    }
}
?>