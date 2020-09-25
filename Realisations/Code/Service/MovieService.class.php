<?php

namespace Code\Service;

use Code\Model\Movie;
use Code\Provider\IGenreProvider;
use Code\Provider\IMovie_imageProvider;
Use Code\Provider\IMovieProvider;
use Exception;

//
Class MovieService implements IMovieProvider
{
    private IMovieProvider $MovieAccess;
    private IGenreProvider $GenreAccess;
    private IMovie_imageProvider $ImageAccess;

    public function __construct(IMovieProvider $m,IGenreProvider $g,IMovie_imageProvider $i)
    {
     $this->MovieAccess = $m;
     $this->GenreAccess = $g;
     $this->ImageAccess = $i;

    }

    public function findAll(): array
    {
        $movies = $this->MovieAccess->findAll();
           
        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());         
            $images = $this->ImageAccess->findAll($movie->getId());
            $movie->setGenres($genres);
            
            $movie->setImages($images);
                    
        }

       
       
        return $movies;
    }

    public function findOne(int $id): Movie
    {
        $movie = $this->MovieAccess->findOne($id);
        $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
        $movie->setGenres($genres);
        $images = $this->ImageAccess->findAll($movie->getId());
        $movie->setImages($images);
        return $movie;
    }


    public function findAllByTitle(string $title): array
    {
        $movies = $this->MovieAccess->findAllByTitle($title);

        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
            $movie->setGenres($genres);
            $images = $this->ImageAccess->findAll($movie->getId());
            $movie->setImages($images);
        }

        return $movies;
    }
}