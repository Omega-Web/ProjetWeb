<?php

Use Code\Model\User;

class Authentification {

     

    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function Compare(string $username ,string $password):User
    {
        $stt = $this->con->prepare('SELECT * FROM user where speudo=:username and password=:password');
        $stt-> bindValue('username',$username,PDO::PARAM_STR);
        $stt-> bindValue('password',$password,PDO::PARAM_STR);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        return new User($data);
    }
}