<?php

namespace Code\Repository;

use PDO;
use PDOException;
use Code\Provider\IMovie_genreProvider;
use Code\Model\Movie_genre;

class GenreRepository implements IMovie_genreProvider{


    public function __construct(PDO $con)
    {

        $this->con = $con;
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM movie_genre';
        $rs = $this->con->query($sql);
        $Movie_genre = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $Movie_genre[]= new Movie_genre($data);
        } 
        $rs->closeCursor();
        return $Movie_genre;
    }

    public function findAllByIdGenre($id_genre): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_genre where fk_genre=:id_genre');
        $stt-> bindValue('id_genre',$id_genre,PDO::PARAM_INT);
        $stt->execute();
        $Movie_genre = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movie_genre[]= new Movie_genre($data);
        } 
        $stt->closeCursor();
        return $Movie_genre;
        
    }

    public function findAllByIdMovie($id_movie): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_genre where fk_movie=:id_movie');
        $stt-> bindValue('id_movie',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        $Movie_genre = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movie_genre[]= new Movie_genre($data);
        } 
        $stt->closeCursor();
        return $Movie_genre;
        
    }

    public function findOne($id_movie, $id_genre): Movie_genre
    {
        $stt = $this->con->prepare('SELECT * FROM movie_genre where fk_movie=:id_movie and fk_genre=:id_genre');
        $stt-> bindValue('id_movie',$id_movie,PDO::PARAM_INT);
        $stt-> bindValue('id_genre',$id_genre,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $Movie_genre= new Movie_genre($data); 
        $stt->closeCursor();
        return $Movie_genre;
        
    }

    

    public function insert(Movie_genre $Movie_genre): bool
    {
        try {
            $sql = 'INSERT INTO `movie_genre`(`fk_movie`, `fk_genre`) VALUES (:id_movie,:id_genre)';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id_movie',$Movie_genre->getId_movie(), PDO::PARAM_INT);
            $stt-> bindValue('id_genre',$Movie_genre->getId_genre(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }

    public function delete(Movie_genre $Movie_genre): bool
    {
        try {
            $sql = 'DELETE FROM `movie_genre` WHERE fk_movie=:id_movie and fk_genre=:id_genre';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id_movie',$Movie_genre->getId_movie(), PDO::PARAM_INT);
            $stt-> bindValue('id_genre',$Movie_genre->getId_genre(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }


}