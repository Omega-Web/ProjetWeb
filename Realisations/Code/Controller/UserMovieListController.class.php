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
    private $userService;
    private $movieService;
    private $user;
    private $moviesArray = [];

    
    public function __construct()
    {
        $userRepo = new UserRepository(Database::get());
        $movieUserRepo = new Movie_userRepository(Database::get());
        $movieRepo = new MovieRepository(Database::get());
        $movieImageRepo = new Movie_imageRepository(Database::get());
        $genreRepo = new GenreRepository(Database::get());
        $movieStaffRepo = new Movie_staffRepository(Database::get());
        $staffRepo = new StaffRepository(Database::get());
        
        $this->userService = new UserService($userRepo,$movieUserRepo);
        $this->movieService = new MovieService($movieRepo, $genreRepo, $movieImageRepo, $movieStaffRepo, $staffRepo);
    }
    
    public function getUser($userID)
    {
        $this->user = $this->userService->findOne($userID);
    }
    public function getMovies()
    {
        $movieListID = $this->user->getId_movies();
        //print_r($movieListID);
        foreach ($movieListID as $movie) {
            //print_r($movie);
            $this->moviesArray[] = $this->movieService->findOne($movie->getId_movie());
        }

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
