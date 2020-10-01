<?php

namespace Code\Controller;

use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Service\MovieService;
use Code\Service\Movie_userService;
use Code\Repository\Movie_staffRepository;
use Code\Repository\Movie_userRepository;
use Code\Repository\StaffRepository;
use Code\Model\Movie_user;


class UpdateUserMovieController
{
    private Movie_userService $movieUserService;
    
    public function __construct()
    {
        $movieImageRepo = new Movie_imageRepository(Database::get());
        $genreRepo = new GenreRepository(Database::get());
        $movieRepo = new MovieRepository(Database::get());
        $movieStaffRepo = new Movie_staffRepository(Database::get());
        $staffRepo = new StaffRepository(Database::get());
        $movieUserRepo = new Movie_userRepository(Database::get());
        $service = new MovieService($movieRepo,$genreRepo,$movieImageRepo, $movieStaffRepo, $staffRepo);

        $this->movieUserService = new Movie_userService($movieUserRepo, $movieRepo);

    }

    public function insertMovieToList($movieId, $userId)
    {
        $movie_user = new Movie_user([]);
        $movie_user->setId_movie($movieId);
        $movie_user->setId_user($userId);

        $this->movieUserService->insert($movie_user);
    }
    public function updateWatchState()
    {

    }
}