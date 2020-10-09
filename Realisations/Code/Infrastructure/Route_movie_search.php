<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);


session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}


require_once '../../bootstrap.php';


use Code\Controller\MovieSearchController;




if(!empty($_POST['action'])){
    // fwrite($fp, ' c le session action ->' . $_SESSION['action']);
    $controller = new MovieSearchController();
    $controller->CallAjax($_POST['action'],$_POST['text']);
    //$controller->editUserMovie($_SESSION['action'], $_SESSION['post-data']['movie-selected'], $_SESSION['id']);
    
}
else{
    //header('Location: ../Views/MovieInfo/MovieInfo.php');
    
}
