<?php

// PHP POST TO UPDATE A MOVIE
require_once '../../../bootstrap.php';
use PDO;
use PDOException;
use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Service\MovieService;
use Code\Service\Movie_userService;
use Code\Repository\Movie_staffRepository;
use Code\Repository\Movie_userRepository;
use Code\Repository\StaffRepository;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$movieImageRepo = new Movie_imageRepository(Database::get());
$genreRepo = new GenreRepository(Database::get());
$movieRepo = new MovieRepository(Database::get());
$movieStaffRepo = new Movie_staffRepository(Database::get());
$staffRepo = new StaffRepository(Database::get());
$movieUserRepo = new Movie_userRepository(Database::get());
$service = new MovieService($movieRepo,$genreRepo,$movieImageRepo, $movieStaffRepo, $staffRepo);

$movieUserService = new Movie_userService($movieUserRepo, $movieRepo);

$userMovie = $movieUserService->findOne(1, $_GET['id']);
$userMovie2 = $movieUserService->findOne(1, $_GET['id']);

if(!empty($_POST['watch_state'])){
    // $userMovieData['id_movie'] = $_GET['id'];
    // $userMovieData['id_user'] = 1; // USE SESSION ID !!!!!!!!!! <---------
    // $userMovieData['watch_state'] = $_POST['watch_state'];
    // $userMovieData['personal_ranking'] = $_POST['personal_ranking'];
    // $userMovieData['comment'] = $_POST['comment'];

    $userMovie2->setWatch_state($_POST['watch_state']);

    try {
        $movieUserService->update($userMovie2, $_GET['id']);
    } catch (Exception $e) {
        echo $e;
    }
}
else if(!empty($_POST['personal_ranking'])){
    $userMovie2->setPersonal_ranking($_POST['personal_ranking']);

    try {
        $movieUserService->update($userMovie2, $_GET['id']);
    } catch (Exception $e) {
        echo $e;
    }
}
else if(!empty($_POST['comment'])){
    $userMovie2->setComment($_POST['comment']);

    try {
        $movieUserService->update($userMovie2, $_GET['id']);
    } catch (Exception $e) {
        echo $e;
    }
}
