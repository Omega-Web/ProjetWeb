<?php

namespace Code\Repository;

require_once 'bootstrap.php';

//require_once './Provider/IMovieProvider.class.php';
//require_once './Model/Movie.class.php';
use PDO;
use Code\Model\Movie;
use Code\Provider\IMovieProvider;


class MovieRepository implements IMovieProvider
{
    private $con;

    public function __construct(PDO $con)
    {

        $this->con = $con;
    }

    public function findAll():array
    {
        $sql = 'SELECT * FROM movie';
        $rs = $this->con->query($sql);
        $Movies = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $Movies[]= new Movie($data);
        } 
        $rs->closeCursor();
        return $Movies;
    }
    public function findOne(int $id):Movie
    {
        
        $stt = $this->con->prepare('SELECT * FROM movie where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return new Movie($data);
        

    }
    public function findAllByTitle(string $title): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie where title like ?');
        $stt->execute(array("$title%"));
        $Movies = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movies[]= new Movie($data);
        }  
        $stt->closeCursor();
        return $Movies;

    }

    
}
