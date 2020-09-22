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
    public function newUser($array)
    {
        $stt = $this->con->prepare('INSERT INTO user VALUES firstname=:firstname,lastname=:lastname,username=:username,email=:email,birhday=:birthday');
        $stt-> bindValue('firstname',$array['firstname'],PDO::PARAM_STR);
        $stt-> bindValue('lastname',$array['lastname'],PDO::PARAM_STR);
        $stt-> bindValue('username',$array['username'],PDO::PARAM_STR);
        $stt-> bindValue('email',$array['email'],PDO::PARAM_STR);
        $stt-> bindValue('password',$array['password'],PDO::PARAM_STR);
        $stt-> bindValue('birthday',$array['birthday']);

    }
  
}
