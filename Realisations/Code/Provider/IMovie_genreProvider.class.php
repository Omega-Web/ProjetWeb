<?php

namespace Code\Provider;

use Code\Model\Movie_genre;


interface IMovie_genreProvider {
    public function findAll(): array;

    public function findAllByIdMovie($id_movie):array;
    
    public function findAllByIdGenre($id_genre):array;

    public function findOne($id_movie,$id_genre):Movie_genre;

    public function insert(Movie_genre $Movie_genre):bool;

    public function delete(Movie_genre $Movie_genre):bool;

}
