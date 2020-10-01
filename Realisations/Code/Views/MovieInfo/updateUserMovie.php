<?php

// PHP POST TO UPDATE A MOVIE
require_once '../../../bootstrap.php';
use Code\Controller\UpdateUserMovieController;


$controller = new UpdateUserMovieController;

// $userMovie = $movieUserService->findOne(1, $_GET['id']);
//$userMovie2 = $movieUserService->findOne(1, $_GET['id']);

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
    
    $controller->insertMovieToList($_GET['id'], 1);
    // try {
    //     $movieUserService->update($userMovie, $_GET['id']);
    // } catch (Exception $e) {
    //     echo $e;
    // }
}
