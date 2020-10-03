<?php

namespace Code\Provider;

use Code\Model\Movie_user;

interface IMovie_userProvider {

    
    public function findAll(): array;

    public function findAllByIdUser($id_user):array;

    public function findAllByIdMovie($id_movie):array;

    public function findOne(int $id_user,int $id_movie): Movie_user;

    public function update(Movie_user $movie_user): bool;
    
    public function delete(Movie_user $movie_user): bool;

    public function insert(Movie_user $movie_user): bool;

}