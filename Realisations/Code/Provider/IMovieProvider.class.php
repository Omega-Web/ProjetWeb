<?php

namespace Code\Provider;

use Code\Model\Movie;

interface IMovieProvider {
    public function findAll(): array;

    public function findOne(int $id): Movie;

    public function findAllByTitle(string $title):array;

    public function update( Movie $newMovie): bool;

    public function insert(Movie $newMovie): bool;

    public function delete(Movie $movie): bool;
}