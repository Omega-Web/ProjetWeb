<?php
namespace Code\Utils;

Use PDO;
use Code\Model\User;

class Authentication {

     

    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    //compare les valeurs d'entre avec les valeur en base pour voir si un utilisateur correspond si oui renvoit l'id et si non renvoit 0
    public function Compare(string $username ,string $password):User
    {
        
        $stt = $this->con->prepare('SELECT * FROM user where username=:username limit 1');
        $stt-> bindValue('username',$username,PDO::PARAM_STR);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        if(password_verify($password,$data['password'])){
            return new User($data); 
        } else {
            return new User([]); 

        }
    }
}