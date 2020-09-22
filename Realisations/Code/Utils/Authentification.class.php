<?php
namespace Code\Utils;

Use Code\Model\User;
Use PDO;

class Authentification {

     

    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    //compare les valeurs d'entre avec les valeur en base pour voir si un utilisateur correspond si oui renvoit l'id et si non renvoit 0
    public function Compare(string $username ,string $password):int
    {
        
        $stt = $this->con->prepare('SELECT id FROM user where pseudo=:username and password=:password limit 1');
        $stt-> bindValue('username',$username,PDO::PARAM_STR);
        $stt-> bindValue('password',$password,PDO::PARAM_STR);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return $data["id"] ?? 0; 
    }
}