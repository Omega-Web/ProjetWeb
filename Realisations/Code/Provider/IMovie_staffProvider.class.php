<?php

namespace Code\Provider;



interface IMovie_staffProvider {
    public function findAll(): array;

    public function findAllByMovie(int $id_movie): array;

}