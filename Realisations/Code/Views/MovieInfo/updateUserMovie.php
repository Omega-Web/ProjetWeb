<?php

// PHP POST TO UPDATE A MOVIE
require_once '../../../bootstrap.php';
use PDO;
use PDOException;
use Code\Repository\Movie_userRepository;
use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Service\MovieService;
use Code\Service\Movie_userService;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$movieUserRepo = new Movie_userRepository(Database::get());
$movieImageRepo = new Movie_imageRepository(Database::get());
$genreRepo = new GenreRepository(Database::get());
$movieRepo = new MovieRepository(Database::get());
$service = new MovieService($movieRepo,$genreRepo,$movieImageRepo);
$movieUserService = new Movie_userService($movieUserRepo, $movieRepo);

$userMovie2 = $movieUserService->findOne(1, $_GET['id']);

if(!empty($_POST)){
    $userMovieData['watch_state'] = $_POST['watch_state'];
    $userMovieData['personal_ranking'] = $_POST['personal_ranking'];
    $userMovieData['comment'] = $_POST['comment'];

    try {
        $movieUserService->update($userMovie, 1);
    } catch (\Throwable $th) {
        //throw $th;
    }
}
