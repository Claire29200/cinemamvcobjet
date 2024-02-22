<?php

namespace cinemamvcobjet\model\dao;

use cinemamvcobjet\model\entities\User;


class UserDao extends BaseDao {

public function createObjectFromFields($fields)
    {  
        $User = new User();

        $User->setId($fields['id'])
              ->setPrenom($fields['nom']) 
              ->setNom($fields['prenom'])
              ->setEmail($fields['email'])
              ->setEmail($fields['password'])
              ->setRole($fields['role'])
        ;      

        return $User;
    }
    public function inscription(User $user)
    {
        $stmt = $this->db->prepare("INSERT INTO user (email,password,nom,prenom, role) VALUES(:email,:password,:nom,:prenom, :role)");
        $res = $stmt->execute
        ([
                ':email' => $user->getNom(),
                ':password' => $user->getNom(),
                ':nom' => $user->getNom(),
                ':prenom' => $user->getPrenom(),
                ':role' => $user->getPhoto(),
            ]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
}