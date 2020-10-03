<?php

namespace Code\Provider;

Use Code\Model\Movie_image;

interface IMovie_imageProvider {

    public function findAll(): array;

    public function findOne(int $id_image): Movie_image;

    public function findAllByIdMovie(int $id_movie):array;


}
