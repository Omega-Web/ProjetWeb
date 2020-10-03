<?php

namespace Code\Service;

use Code\Model\Movie;
use Code\Provider\IGenreProvider;
use Code\Provider\IMovie_imageProvider;
use Code\Provider\IMovie_staffProvider;
Use Code\Provider\IMovieProvider;
use Code\Provider\IStaffProvider;
use Exception;

//
Class MovieService implements IMovieProvider
{
    private IMovieProvider $MovieAccess;
    private IGenreProvider $GenreAccess;
    private IMovie_imageProvider $ImageAccess;
    private IMovie_staffProvider $Movie_staffAccess;
    private IStaffProvider $StaffAccess;

    public function __construct(IMovieProvider $m,IGenreProvider $g,IMovie_imageProvider $i, IMovie_staffProvider $ms, IStaffProvider $s)
    {
     $this->MovieAccess = $m;
     $this->GenreAccess = $g;
     $this->ImageAccess = $i;
     $this->Movie_staffAccess = $ms;
     $this->StaffAccess = $s;

    }

    public function findAll(): array
    {
        $movies = $this->MovieAccess->findAll();
           
        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());         
            $images = $this->ImageAccess->findAllByIdMovie($movie->getId());
            $ids_staffs = $this->Movie_staffAccess->findAllByMovie($movie->getId());
            $movie->setGenres($genres);
            $movie->setImages($images);
            $movie->setStaffsId($ids_staffs);
            $staff  = [];
            foreach($ids_staffs as $id_staff)
            {
                $staff[]= $this->StaffAccess->findOne($id_staff);
            }
            $movie->setStaffs($staff);
                    
        } 
       
        return $movies;
    }

    public function findOne(int $id): Movie
    {
        $movie = $this->MovieAccess->findOne($id);
        $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
        $movie->setGenres($genres);
        $images = $this->ImageAccess->findAllByIdMovie($movie->getId());
        $movie->setImages($images);
        $ids_staffs = $this->Movie_staffAccess->findAllByMovie($movie->getId());
        $movie->setStaffsId($ids_staffs);
        $staff  = [];
            foreach($ids_staffs as $id_staff)
            {
                $staff[]= $this->StaffAccess->findOne($id_staff);
            }
            $movie->setStaffs($staff);
        return $movie;
    }


    public function findAllByTitle(string $title): array
    {
        $movies = $this->MovieAccess->findAllByTitle($title);

        foreach($movies as $movie)
        {
            $genres = $this->GenreAccess->findAllByIdMovie($movie->getId());
            $movie->setGenres($genres);
            $images = $this->ImageAccess->findAllByIdMovie($movie->getId());
            $movie->setImages($images);
            $ids_staffs = $this->Movie_staffAccess->findAllByMovie($movie->getId());
            $movie->setStaffsId($ids_staffs);
            $staff  = [];
            foreach($ids_staffs as $id_staff)
            {
                $staff[]= $this->StaffAccess->findOne($id_staff);
            }
            $movie->setStaffs($staff);
        }

        return $movies;
    }

    public function update(Movie $newMovie): bool
    {
        return $this->MovieAccess->update($newMovie);
               
    }
        
    public function insert(Movie $newMovie): bool
    {
        return $this->MovieAccess->insert($newMovie);

    }

    public function delete(Movie $movie): bool
    {
        return $this->MovieAccess->delete($movie);
    }
}