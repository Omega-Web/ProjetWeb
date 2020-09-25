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

    //retourne tout les films en base
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

    //retourne un film en fonction de son id en base
    public function findOne(int $id):Movie
    {
        
        $stt = $this->con->prepare('SELECT * FROM movie where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return new Movie($data);
        

    }

    //retourne les films qui contient la chaine reçu($title)
    public function findAllByTitle(string $title): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie where title like ?');
        $stt->execute(array("%$title%"));
        $Movies = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movies[]= new Movie($data);
        }  
        $stt->closeCursor();
        return $Movies;

    }
    public function updateMovie(Movie $newMovie): bool
    {
        try {
            $sql = 'UPDATE movie SET title=:title , plot=:plot , duration=:duration , date=:date , fk_age_restriction=:age_restriction_id WHERE id=:id ';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id',$newMovie->getId(), PDO::PARAM_INT);
            $stt-> bindValue('title',$newMovie->getTitle(), PDO::PARAM_STR);
            $stt-> bindValue('plot',$newMovie->getPlot(), PDO::PARAM_STR);
            $stt-> bindValue('duration',$newMovie->getDuration(), PDO::PARAM_STR);
            $stt-> bindValue('date',$newMovie->getDate());
            $stt-> bindValue('age_restriction_id',$newMovie->getAge_restriction_id(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();
            return true;
            
        }
        catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }        
    }
    public function insertMovie(Movie $newMovie): bool
    {
        try {
            $sql = 'INSERT INTO movie (title, plot, duration, date, fk_age_restriction) VALUES (:title, :plot, :duration, :date, :age_restriction_id)';
            $stt = $this->con->prepare($sql);
            // $stt-> bindValue('id',$newMovie->getId(), PDO::PARAM_INT);
            $stt-> bindValue('title',$newMovie->getTitle(), PDO::PARAM_STR);
            $stt-> bindValue('plot',$newMovie->getPlot(), PDO::PARAM_STR);
            $stt-> bindValue('duration',$newMovie->getDuration(), PDO::PARAM_STR);
            $stt-> bindValue('date',$newMovie->getDate());
            $stt-> bindValue('age_restriction_id',$newMovie->getAge_restriction_id(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }
    public function deleteMovie($movie): bool
    {
        try {
            $sql = 'DELETE FROM movie WHERE id = :id';
            $stt = $this->con->prepare($sql);
            $stt->bindValue('id',$movie->getId(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }

    
}
