<?php



namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\Films;
use cinemamvcobjet\model\entities\Acteurs;

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
              ->setAffiche($fields['affiche']) ;
             
             //var_dump($film);die();        
        return $film;
        
    }
    public function create(Films $film)
    {
        $stmt = $this->db->prepare("INSERT INTO film (titre,date_de_sortie,une_affiche,id_genre,id_realisateur) VALUES(:titre, :date, :affiche, :idgenre, :idrealisateur)");
        $res = $stmt->execute([
            ':nom' => $film->getName(),
            ':date' => $film->getDate(),
            ':affiche' => $film->getAffiche(),
            ':idgenre' => $film->getGenre()->getId(),
            ':idrealisateur' => $film->getRealisateur()->getId()
        ]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function update(Films $film)
    {
        $stmt = $this->db->prepare('UPDATE films SET nom=:nom,date_de_sortie=:date_de_sortie,affiche=:affiche,id_genre=:id_genre,id_realisateur=:id
WHERE films.id_film= :id');
        $res = $stmt->execute(
            [
                ':id_film' => $film->getId(),
                ':nom' => $film->getName(),
                ':date_de_sortie' => $film->getDate(),
                ':affiche' => $film->getAffiche(),
                ':id_genre' => $film->getGenre()->getId(),
                ':id_real' => $film->getRealisateur()->getId()

            ]
        );
        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    public function addActorToFilm(Acteurs $acteur, Films $film)
    {
        echo "<pre>";
        print_r($acteur);
        print_r($film);
        $stmt = $this->db->prepare("INSERT INTO `compose` (id_films,id_acteurs) VALUES ( :idfilm , :idacteur)");
        $res = $stmt->execute([
            ':idfilm' => $film->getId(),
            ':idacteur' => $acteur->getId(),
        ]);

    }

    public function delete(Films $film)
    {
        $stmt = $this->db->prepare('DELETE FROM `compose` WHERE id_film = :idfilm ;  DELETE from films WHERE id_film=:idfilm');
        $res = $stmt->execute([

            ':idfilm' => $film->getId()
        ]);
        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }

    }
}



?>