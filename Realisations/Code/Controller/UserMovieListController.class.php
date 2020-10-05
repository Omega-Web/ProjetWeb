<?php

namespace Code\Controller;

use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\Movie_staffRepository;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;
use Code\Service\MovieService;

class UserMovieListController 
{
    private $userListService;
    private $moviesArray;
    
    public function __construct()
    {
        $movieImageRepo = new Movie_imageRepository(Database::get());
        $genreRepo = new GenreRepository(Database::get());
        $movieRepo = new MovieRepository(Database::get());
        $movieStaffRepo = new Movie_staffRepository(Database::get());
        $staffRepo = new StaffRepository(Database::get());
    
        $this->userListService = new MovieService($movieRepo,$genreRepo,$movieImageRepo, $movieStaffRepo, $staffRepo);
    }
        public function getMovies()
    {
        $this->moviesArray = $this->userListService->findAll();
        return count($this->moviesArray);
    }

    public function getTitle($index):string 
    {
        return $this->moviesArray[$index]->getTitle();
    }
    public function getImageBase64($index)
    {
        return base64_encode($this->moviesArray[$index]->getImages()[0]['image']);
    }
    public function getId($index):int
    {
        return $this->moviesArray[$index]->getId();
    }
}
