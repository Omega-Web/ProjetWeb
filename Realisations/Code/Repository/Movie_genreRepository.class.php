<?php

namespace Code\Repository;

use PDO;
use PDOException;
use Code\Provider\IMovie_genreProvider;

class GenreRepository implements IMovie_genreProvider{


    public function __construct(PDO $con)
    {

        $this->con = $con;
    }

    public function findAll(int $id_movie): array
    {
        $sql = 'SELECT * FROM movie_genre';
        $rs = $this->con->query($sql);
        $GenresId = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $GenresId[]= $data['fk_genre'];
        } 
        $rs->closeCursor();
        return $GenresId;
    }


}