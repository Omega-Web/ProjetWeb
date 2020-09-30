<?php

namespace Code\Repository;

use PDO;
use PDOException;
use Code\Provider\IMovie_staffProvider;

class Movie_staffRepository implements IMovie_staffProvider{


    public function __construct(PDO $con)
    {

        $this->con = $con;
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM type_movie_staff_movie_staff_movie';
        $rs = $this->con->query($sql);
        $ids = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $ids[]= $data['fk_movie_staff'];
        } 
        $rs->closeCursor();
        return $ids;
    }

    public function findAllByMovie(int $id_movie): array
    {
        $stt = $this->con->prepare('SELECT * FROM type_movie_staff_movie_staff_movie where fk_movie=:fk_movie');
        $stt-> bindValue('fk_movie',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        $ids = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $ids[]= $data['fk_movie_staff'];
        }  
        $stt->closeCursor();
        return $ids;
    }
}