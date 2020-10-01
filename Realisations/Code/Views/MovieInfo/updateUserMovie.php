<?php

// PHP POST TO UPDATE A MOVIE
require_once '../../../bootstrap.php';
use Code\Controller\UpdateUserMovieController;

error_reporting(E_ALL);
ini_set("display_errors", 1);


$controller = new UpdateUserMovieController;

// if(!empty($_POST['watch_state'])){
//     // $userMovieData['id_movie'] = $_GET['id'];
//     // $userMovieData['id_user'] = 1; // USE SESSION ID !!!!!!!!!! <---------
//     // $userMovieData['watch_state'] = $_POST['watch_state'];
//     // $userMovieData['personal_ranking'] = $_POST['personal_ranking'];
//     // $userMovieData['comment'] = $_POST['comment'];
    
//     $userMovie->setWatch_state($_POST['watch_state']);

//     try {
//         $movieUserService->update($userMovie, $_GET['id']);
//     } catch (Exception $e) {
//         echo $e;
//     }
// }
// else if(!empty($_POST['personal_ranking'])){
//     $userMovie->setPersonal_ranking($_POST['personal_ranking']);

//     try {
//         $movieUserService->update($userMovie, $_GET['id']);
//     } catch (Exception $e) {
//         echo $e;
//     }
// }
if(!empty($_POST['add-to-list-btn'])){
    
    echo 'avant insert';
    $controller->insertMovieToList($_GET['id'], 1);
    echo 'avant header';
    header('Location: MovieInfo.php?id='.$_GET['id']);
    echo 'apres header';
}

?>