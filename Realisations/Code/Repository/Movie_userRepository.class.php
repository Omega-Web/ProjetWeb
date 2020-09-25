<?php

namespace Code\Repository;

use PDOException;
use Code\Model\Movie_user;
use Code\Provider\IMovie_userProvider;
USE PDO;

class Movie_userRepository implements IMovie_userProvider
{
    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function findAll(int $id_user): array
    {
        $stt = $this->con->prepare('SELECT * FROM user_movie_list where fk_user=:id_user');
        $stt-> bindValue('id_user',$id_user,PDO::PARAM_INT);
        $stt->execute();
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movies_user[]= new Movie_user($data);
        }   
        return $Movies_user;
    }

    public function findOne(int $id_user, int $id_movie): Movie_user
    {
        $stt = $this->con->prepare('SELECT * FROM user_movie_list where fk_user=:id_user and fk_movie=:id_movie');
        $stt-> bindValue('id_user',$id_user,PDO::PARAM_INT);
        $stt-> bindValue('id_movie',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        return new Movie_user($data);   
    }
  
}


?>