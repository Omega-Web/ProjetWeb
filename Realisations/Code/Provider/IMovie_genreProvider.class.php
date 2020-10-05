<?php

namespace Code\Provider;


interface IMovie_genreProvider {
    public function findAll(): array;

    public function findAllByIdMovie($id_movie):array;

    public function findAllByIdGenre($id_genre):array;

    public function findOne($id_movie,$id_genre);

    public function insert($Movie_genre):bool;

    public function delete($Movie_genre):bool;

}
