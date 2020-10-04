<?php

namespace Code\Repository;

use PDO;
use PDOException;
use Code\Model\Genre;
use Code\Provider\IGenreProvider;

class GenreRepository implements IGenreProvider{


    public function __construct(PDO $con)
    {

        $this->con = $con;
    }
    //retourne tout les genres
    public function findAll(): array
    {
        $sql = 'SELECT * FROM genre';
        $rs = $this->con->query($sql);
        $Genres = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $Genres[]= new Genre($data);
        } 
        $rs->closeCursor();
        return $Genres;
    }
    //retourne un genre en fonction de l'id du genre
    public function findOne(int $id): Genre
    {
        $stt = $this->con->prepare('SELECT * FROM genre where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return new Genre($data);
        
    }
    //retourne tout les genres qui commence par la string dans $genre
    public function findAllByGenre(string $Genre):array
    {
        $stt = $this->con->prepare('SELECT * FROM genre where name like ?');
        $stt->execute(array("$Genre%"));
        $Genres = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Genres[]= new Genre($data);
        }  
        $stt->closeCursor();
        return $Genres;
    }

    //retourne tout les genres d'un film en fonction de son id
    public function findAllByIdMovie(int $id):array
    {
        $stt = $this->con->prepare('SELECT genre.id,genre.name from movie join movie_genre on movie.id = movie_genre.fk_movie join genre on movie_genre.fk_genre = genre.id where movie.id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $Genres = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Genres[] = new Genre($data);
        }  
        $stt->closeCursor();
        return $Genres;
    }
    //change les valeur en base pour un genre
    public function updateGenre(Genre $oldValue, Genre $newValue): bool
    {
        try {
            $sql = 'UPDATE genre SET name = :name WHERE id =:id';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id',$oldValue->getId(), PDO::PARAM_INT);
            $stt-> bindValue('name',$newValue->getName(), PDO::PARAM_STR);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }

//supprime un genre
    public function deleteGenre(Genre $id): bool
    {
        try {
            $sql = 'DELETE FROM genre WHERE id=:id';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id',$id->getId(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();

            return true;
        
        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }
    //ajoute un genre
    public function insertGenre(Genre $newValue): bool
    {
        try {
            $sql = 'INSERT INTO genre (name) VALUES (:name)';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('name',$newValue->getName(), PDO::PARAM_STR);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }
  
}
