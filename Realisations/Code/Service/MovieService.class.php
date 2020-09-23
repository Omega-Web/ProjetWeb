<?php

namespace Code\Service;

use Code\Model\Movie;
use Code\Provider\IGenreProvider;
Use Code\Provider\IMovieProvider;

Class MovieService implements IMovieProvider
{
    private IMovieProvider $MovieAccess;
    private IGenreProvider $GenreAccess;

    public function __construct(IMovieProvider $m,IGenreProvider $g)
    {
     $this->MovieAccess = $m;
     $this->GenreAccess = $g;

    }

    public function findAll(): array
    {
        $movies = $this->MovieAccess->findAll();

        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
            $movie->setGenres($genres);
        }

        return $movies;
    }

    public function findOne(int $id): Movie
    {
        $movie = $this->MovieAccess->findOne($id);
        $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
        $movie->setGenres($genres);

        return $movie;
    }


    public function findAllByTitle(string $title): array
    {
        $movies = $this->MovieAccess->findAllByTitle($title);

        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
            $movie->setGenres($genres);
        }

        return $movies;
    }
}