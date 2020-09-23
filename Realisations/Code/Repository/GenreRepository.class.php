<?php

namespace Code\Repository;

use PDO;
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
        $stt = $this->con->prepare('SELECT genre.id,genre.name from Movie join movie_genre on movie.id = movie_genre.fk_movie join genre on movie_genre.fk_genre = genre.id where movie.id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $Genres = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Genres[]= new Genre($data);
        }  
        $stt->closeCursor();
        return $Genres;
    }
}