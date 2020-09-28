<?php

namespace Code\Service;

use Code\Model\Movie;
use Code\Provider\IGenreProvider;
use Code\Provider\IMovie_imageProvider;
use Code\Provider\IMovie_staffProvider;
Use Code\Provider\IMovieProvider;
use Exception;

//
Class MovieService implements IMovieProvider
{
    private IMovieProvider $MovieAccess;
    private IGenreProvider $GenreAccess;
    private IMovie_imageProvider $ImageAccess;
    private IMovie_staffProvider $Movie_staffAccess;

    public function __construct(IMovieProvider $m,IGenreProvider $g,IMovie_imageProvider $i, IMovie_staffProvider $s)
    {
     $this->MovieAccess = $m;
     $this->GenreAccess = $g;
     $this->ImageAccess = $i;
     $this->Movie_staffAccess = $s;

    }

    public function findAll(): array
    {
        $movies = $this->MovieAccess->findAll();
           
        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());         
            $images = $this->ImageAccess->findAll($movie->getId());
            $staffs = $this->Movie_staffAccess->findAllByMovie($movie->getId());
            $movie->setGenres($genres);
            $movie->setImages($images);
            $movie->setStaffsId($staffs);
                    
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
        $staffs = $this->Movie_staffAccess->findAllByMovie($movie->getId());
        $movie->setStaffsId($staffs);
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
            $staffs = $this->Movie_staffAccess->findAllByMovie($movie->getId());
            $movie->setStaffsId($staffs);
        }

        return $movies;
    }

    public function updateMovie(Movie $newMovie): bool
    {
        $genres = $newMovie->getGenres();

        foreach ($genres as $genre) {
            if($genre->getId() === 0)
            {
                $this->GenreAccess->insertGenre($genre);
            }
            else
            {
                //$this->GenreAccess->updateGenre($genre);
            }
           
        }
        
        return $this->MovieAccess->updateMovie($newMovie);
    } 

    public function insertMovie(Movie $newMovie): bool
    {
        return $this->MovieAccess->insertMovie($newMovie);

    }

    public function deleteMovie(Movie $movie): bool
    {
        return $this->MovieAccess->deleteMovie($movie);
    }
}