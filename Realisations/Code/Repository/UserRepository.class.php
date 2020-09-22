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
    public function findOne(int $id):User
    {
        
        $stt = $this->con->prepare('SELECT * FROM   user where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        return new User($data);

    }
    public function saveUser($user)
    {
        $stt = $this->con->prepare('INSERT INTO user (firstname,lastname,email,username,password,birthday) VALUES (:firstname, :lastname, :email, :username, :password, :birthday)');
        $stt-> bindValue('firstname',$user->getFirstname(),PDO::PARAM_STR);
        $stt-> bindValue('lastname',$user->getLastname(),PDO::PARAM_STR);
        $stt-> bindValue('username',$user->getUsername(),PDO::PARAM_STR);
        $stt-> bindValue('email',$user->getEmail(),PDO::PARAM_STR);
        $stt-> bindValue('password',password_hash($user->getPassword(),PASSWORD_BCRYPT),PDO::PARAM_STR);
        $stt-> bindValue('birthday',$user->getBirthday()->format('Y-m-d'));
        print_r($stt);
        $stt->execute();
        $stt->closeCursor();
    }
  
}
