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

class MovieInfoController
{
    private $MovieService;
    private $movieUserService;
    private $movie;
    private $usermovie;

    public function __construct()
    {
        $movieImageRepo = new Movie_imageRepository(Database::get());
        $genreRepo = new GenreRepository(Database::get());
        $movieRepo = new MovieRepository(Database::get());
        $movieStaffRepo = new Movie_staffRepository(Database::get());
        $staffRepo = new StaffRepository(Database::get());
        $movieUserRepo = new Movie_userRepository(Database::get());

        $this->service = new MovieService($movieRepo,$genreRepo,$movieImageRepo, $movieStaffRepo, $staffRepo);
        $this->movieUserService = new Movie_userService($movieUserRepo, $movieRepo);
    }

    public function getInfoMovie($id_user,$id_movie)
    {
        $this->movie = $this->service->findOne($id_movie);
        // HAVE TO ADD SESSION ID FOR ->
        $this->usermovie = $this->movieUserService->findOne($id_user, $id_movie);
    }

    public function getTitle():string 
    {
        return $this->movie->getTitle();
    }
    public function getImageBase64()
    {
        return base64_encode($this->movie->getImages()[0]['image']);
    }
    public function getId():int
    {
        return $this->movie->getId();
    }
    public function getPlot():string
    {
        return $this->movie->getPlot();
    }
    public function getComment():string
    {
        return $this->usermovie->getComment();
    }
    public function getDate():string
    {
        return $this->movie->getDate()->format('d M Y');
    }
    public function getStaffs():array
    {
        return $this->movie->getStaffs();
    }
    public function getGenres():array
    {
        return $this->movie->getGenres();
    }
    public function getDuration():string
    {
        return $this->movie->getDuration();
    }
}