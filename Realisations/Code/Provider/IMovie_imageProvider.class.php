<?php

namespace Code\Provider;

use Code\Model\Movie_genre;
Use Code\Model\Movie_image;

interface IMovie_imageProvider {
    public function findAll(): array;

    public function findAllByMovie(int $id_movie): array;

    public function findOne(int $id_image):Movie_image ;

    public function insert(Movie_image $movie_image):bool;

    public function delete(Movie_image $movie_image):bool;

    public function update(Movie_image $movie_image):bool;
}
