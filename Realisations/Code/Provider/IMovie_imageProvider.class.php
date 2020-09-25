<?php

namespace Code\Provider;


interface IMovie_imageProvider {
    public function findAll(int $id_movie): array;

    public function findOne(int $id_movie,int $id_image): string;
}
