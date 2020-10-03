<?php

namespace Code\Provider;


interface IMovie_genreProvider {
    public function findAll(int $id_movie): array;

}
