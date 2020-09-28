<?php

namespace Code\Provider;

use Code\Model\Movie_user;

interface IMovie_userProvider {

    
    public function findAll(int $id_user): array;

    public function findOne(int $id_user,int $id_movie): Movie_user;

    public function update(Movie_user $movie_user, int $id_user): bool;
 

}