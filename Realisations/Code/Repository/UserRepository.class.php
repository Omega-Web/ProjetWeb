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
    //Crer un utilisateur ou mmet `a jour un utilisateur existant
    public function saveUser($user): int
    {
        if($user->getId() === 0 ||$user->getId() === NULL) {
            $sql = 'INSERT INTO user (firstname,lastname,email,username,password,birthday) VALUES (:firstname, :lastname, :email, :username, :password, :birthday)';
        } else {
            $sql = 'UPDATE user SET firstname = :firstname, lastname = :lastname, email = :email, username = :username, password = :password, birthday = :birthday';
        }
        

        $stt = $this->con->prepare($sql);
        $stt-> bindValue('firstname',$user->getFirstname(),PDO::PARAM_STR);
        $stt-> bindValue('lastname',$user->getLastname(),PDO::PARAM_STR);
        $stt-> bindValue('username',$user->getUsername(),PDO::PARAM_STR);
        $stt-> bindValue('email',$user->getEmail(),PDO::PARAM_STR);
        $stt-> bindValue('password',password_hash($user->getPassword(),PASSWORD_BCRYPT),PDO::PARAM_STR);
        $stt-> bindValue('birthday',$user->getBirthday()->format('Y-m-d'));
        print_r($stt);
        $stt->execute();
        $stt->closeCursor();

        return $user->getId() > 0 ? $user->getId() : $this->con->lastInsertId();

    }
  
}
