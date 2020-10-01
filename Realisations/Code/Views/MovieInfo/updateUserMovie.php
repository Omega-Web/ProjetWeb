<?php

// PHP POST TO UPDATE A MOVIE
require_once '../../../bootstrap.php';
use Code\Controller\UpdateUserMovieController;

error_reporting(E_ALL);
ini_set("display_errors", 1);


$controller = new UpdateUserMovieController;
if(!empty($_POST['watch_state'])){
    $userMovie = $controller->getMovie($_GET['id'], 1);
    $controller->updateWatchState($userMovie);
}
else if(!empty($_POST['add-to-list-btn'])){
    $controller->insertMovieToList($_GET['id'], 1);
}

?>