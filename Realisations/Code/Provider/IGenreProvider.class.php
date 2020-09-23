<?php

namespace Code\Provider;

use Code\Model\Genre;

interface IGenreProvider {
    public function findAll(): array;

    public function findOne(int $id): Genre;

    public function findAllByGenre(string $Genre):array;

    public function findAllByIdMovie(int $id):array;

    // update, remove, insert for new genres

    public function updateGenre(Genre $oldValue, Genre $newValue): bool;
    
    public function deleteGenre(Genre $id): bool;
    
    public function insertGenre(Genre $newValue): bool;
}