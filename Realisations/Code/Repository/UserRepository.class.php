<?php

namespace Code\Repository;

require_once 'bootstrap.php';

use PDO;
use Code\Model\User;
use Code\Provider\IUserProvider;

class UserRepository implements IUserProvider {
    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con
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
        $rs->closeCursor();
        return $User;
    }
    public function findOne(int $id):User
    {
        $stt = $this->con->prepare('SELECT * FROM   user where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return new User($data);
    }

    public function newUser(User $newUser)
    {
        $stt = $this->con->prepare('INSERT INTO user VALUES firstname=:firstname, lastname=:lastname, email=:email, username=:username, password=:password, birthday=:birthday');
        $stt->bindValue('firstname',$newUser['firstname'],PDO::PARAM_STR);
        $stt->bindValue('lastname',$newUser['lastname'],PDO::PARAM_STR);
        $stt->bindValue('email',$newUser['email'],PDO::PARAM_STR);
        $stt->bindValue('username',$newUser['username'],PDO::PARAM_STR);
        $stt->bindValue('password',$newUser['password'],PDO::PARAM_STR); 
        $stt->execute();
    }
    
}
