<?php

USE PDO;

class ListMovieRepository
{
    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function findAllByIdUser($id_user)
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
}


?>