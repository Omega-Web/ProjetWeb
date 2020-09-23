<?php

namespace Code\Service;

use Code\Model\Movie;
use Code\Provider\IGenreProvider;
Use Code\Provider\IMovieProvider;

Class MovieService implements IMovieProvider
{
    private IMovieProvider $Movie;
    private IGenreProvider $Genre;

    public function MovieService(IMovieProvider $m,IGenreProvider $g)
    {
     $this->Movie = $m;
     $this->Genre = $g;

    }

    public function findAll(): array
    {
        $movies = $this->Movie->findAll();

        foreach($movies as $movie)
        {
            $genres = $this->Genre->findAllByIdMovie($movie->getId());
            $movie->setGenre($genres);
        }

        return [];
    }

    public function findOne(int $id): Movie
    {
        $movie = $this->Movie->findOne($id);
        $genres = $this->Genre->findAllByIdMovie($movie->getId());
        $movie->setGenres($genres);

        return $movie;
    }


    public function findAllByTitle(string $title): array
    {
        return [];
    }
}