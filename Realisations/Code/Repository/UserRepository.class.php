<?php

namespace Code\Repository;

use PDOException;
use PDO;
use Code\Model\User;
use Code\Provider\IUserProvider;

class UserRepository implements IUserProvider {
    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }
    //Retourne tous les utilisateurs
    public function findAll():array
    {
        $sql = 'SELECT * FROM user';
        $rs = $this->con->query($sql);
        $User = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $User[]= new User($data);
        }   
        return $User;
    }
    //Retourne un utilisateur
    public function findOne(int $id):User
    {
        
        $stt = $this->con->prepare('SELECT * FROM   user where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        return new User($data);

    }
    //Créer un utilisateur ou met à jour un utilisateur existant
    public function insertUser(User $user): bool
    {
        try{
        $sql = 'INSERT INTO user (firstname,lastname,email,username,password,birthday, fk_user_type) VALUES (:firstname, :lastname, :email, :username, :password, :birthday, :fk_user_type)';
        

        $stt = $this->con->prepare($sql);
        $stt-> bindValue('firstname',$user->getFirstname(),PDO::PARAM_STR);
        $stt-> bindValue('lastname',$user->getLastname(),PDO::PARAM_STR);
        $stt-> bindValue('username',$user->getUsername(),PDO::PARAM_STR);
        $stt-> bindValue('email',$user->getEmail(),PDO::PARAM_STR);
        $stt-> bindValue('password',password_hash($user->getPassword(),PASSWORD_DEFAULT),PDO::PARAM_STR);
        $stt-> bindValue('birthday',$user->getBirthday()->format('Y-m-d'));
        $stt-> bindValue('fk_user_type', 2, PDO::PARAM_INT);
        $stt->execute();
        $stt->closeCursor();
        return true;
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }


    }
    //Mise à jour des infos utilisateurs, retourne l'id de l'utilisateur
    public function updateUser(User $user): bool
    {
        try
        {
            $sql = 'UPDATE user SET email = :email, password = :password WHERE id=:id';

            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id',$user->getId(),PDO::PARAM_INT);
            $stt-> bindValue('email',$user->getEmail(),PDO::PARAM_STR);
            $stt-> bindValue('password',password_hash($user->getPassword(), PASSWORD_DEFAULT),PDO::PARAM_STR);
    
            $stt->execute();
            $stt->closeCursor();
    
            return true;
        }
        catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
       

    }

    //Supprime l'utilisateur en fonction de l'id
    public function deleteUser(User $user): bool
    {
        try {
        $sql = 'DELETE FROM user WHERE id = :id';
        $stt = $this->con->prepare($sql);
        $stt->bindValue('id',$user->getId(),PDO::PARAM_INT);
        $stt->execute();
        $stt->closeCursor();
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
        return true;
    }
    
    
}
