<?php

namespace Code\Provider;

use Code\Model\Movie;

interface IMovieProvider {
    public function findAll(): array;

    public function findOne(int $id): Movie;

    public function findAllByTitle(string $title):array;

    public function updateMovie(Movie $oldMovie, Movie $newMovie): bool;

    public function insertMovie(Movie $newMovie): bool;

    public function deleteMovie(Movie $id): bool;
}