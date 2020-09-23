<?php

namespace Code\Repository;

require_once 'bootstrap.php';

//require_once './Provider/IMovieProvider.class.php';
//require_once './Model/Movie.class.php';
use PDO;
use PDOException;
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
    public function updateMovie(Movie $oldMovie, Movie $newMovie): bool
    {
        try {
            $sql = 'UPDATE movie SET title = :title, plot = :plot, duration = :duration, date = :date, fk_age_restriction = :age_restriction_id WHERE id =:id';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id',$oldMovie->getId(), PDO::PARAM_INT);
            $stt-> bindValue('title',$newMovie->getTitle(), PDO::PARAM_STR);
            $stt-> bindValue('plot',$newMovie->getPlot(), PDO::PARAM_STR);
            $stt-> bindValue('duration',$newMovie->getDuration(), PDO::PARAM_STR);
            $stt-> bindValue('date',$newMovie->getDate()->format('Y-m-d'));
            $stt-> bindValue('age_restriction_id',$newMovie->getAge_restriction_id(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            return false;
        }        
    }
    public function insertMovie(Movie $newMovie): bool
    {
        try {
            $stt = $this->con->prepare('INSERT INTO movie ' . $newMovie);
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }
    public function deleteMovie($id): bool
    {
        try {
            $stt = $this->con->prepare('DELETE FROM movie WHERE id = ' . $id);
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }

    
}
