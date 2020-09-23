<?php

namespace Code\Repository;

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
    public function createUser($user): bool
    {
        try{
        $sql = 'INSERT INTO user (firstname,lastname,email,username,password,birthday) VALUES (:firstname, :lastname, :email, :username, :password, :birthday)';
        

        $stt = $this->con->prepare($sql);
        $stt-> bindValue('firstname',$user->getFirstname(),PDO::PARAM_STR);
        $stt-> bindValue('lastname',$user->getLastname(),PDO::PARAM_STR);
        $stt-> bindValue('username',$user->getUsername(),PDO::PARAM_STR);
        $stt-> bindValue('email',$user->getEmail(),PDO::PARAM_STR);
        $stt-> bindValue('password',password_hash($user->getPassword(),PASSWORD_BCRYPT),PDO::PARAM_STR);
        $stt-> bindValue('birthday',$user->getBirthday()->format('Y-m-d'));

        $stt->execute();
        $stt->closeCursor();
        return true;
        } catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }


    }
    
    public function updateUser($user): int
    {

        $sql = 'UPDATE user SET firstname = :firstname, lastname = :lastname, email = :email, username = :username, password = :password, birthday = :birthday WHERE id=:id';

        $stt = $this->con->prepare($sql);
        $stt-> bindValue('if',$user->getId(),PDO::PARAM_INT);
        $stt-> bindValue('firstname',$user->getFirstname(),PDO::PARAM_STR);
        $stt-> bindValue('lastname',$user->getLastname(),PDO::PARAM_STR);
        $stt-> bindValue('username',$user->getUsername(),PDO::PARAM_STR);
        $stt-> bindValue('email',$user->getEmail(),PDO::PARAM_STR);
        $stt-> bindValue('password',password_hash($user->getPassword(),PASSWORD_BCRYPT),PDO::PARAM_STR);
        $stt-> bindValue('birthday',$user->getBirthday()->format('Y-m-d'));

        $stt->execute();
        $stt->closeCursor();

        return $user->getId();

    }

    public function delUser($user)
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
    }
  
}
