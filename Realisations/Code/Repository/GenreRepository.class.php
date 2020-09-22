<?php

namespace Code\Repository;


use Code\Model\Genre;
use Code\Provider\IGenreProvider;

class GenreRepository implements IGenreProvider{


    public function __construct(PDO $con)
    {

        $this->con = $con;
    }

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

    public function findOne(int $id): Genre
    {
        $stt = $this->con->prepare('SELECT * FROM genre where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return new Genre($data);
        
    }

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
}