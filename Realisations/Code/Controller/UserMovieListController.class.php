<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Service\UserService;
use Code\Service\MovieService;
use Code\Repository\Movie_userRepository;
use Code\Repository\MovieRepository;
use Code\Repository\UserRepository;
use Code\Repository\Movie_imageRepository;
use Code\Repository\GenreRepository;
use Code\Repository\Movie_staffRepository;
use Code\Repository\StaffRepository;

class UserMovieListController 
{
    private $userListService;
    private $movieService;
    private $moviesID;
    private $moviesByUser;

    
    public function __construct()
    {
        $userRepo = new UserRepository(Database::get());
        $movieUserRepo = new Movie_userRepository(Database::get());
        $movieRepo = new MovieRepository(Database::get());
        $movieImageRepo = new Movie_imageRepository(Database::get());
        $genreRepo = new GenreRepository(Database::get());
        $movieStaffRepo = new Movie_staffRepository(Database::get());
        $staffRepo = new StaffRepository(Database::get());
        
        $this->userListService = new UserService($userRepo,$movieUserRepo);
        $this->movieService = new MovieService($movieRepo, $genreRepo, $movieImageRepo, $movieStaffRepo, $staffRepo);
    }
        public function getMoviesUser()
    {
        $this->moviesID = $this->userListService->findAll();
        //print_r($this->moviesID);
        foreach($this->moviesID as $movie){
            print_r($movie);
            $this->moviesByUser = $this->movieService->findAll();
        }
        return $this->moviesByUser;
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
