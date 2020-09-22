<?php

namespace Code\Provider;

use Code\Model\Genre;

interface IGenreProvider {
    public function findAll(): array;

    public function findOne(int $id): Genre;

    public function findAllByGenre(string $Genre):array;
}