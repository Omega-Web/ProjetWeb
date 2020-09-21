<?php

namespace Code\Provider;

use Code\Model\Movie;

interface IMovieProvider {
    public function findAll(): array;

    public function findOne(int $id): Movie;

    public function findByTitle(string $title):array;
}