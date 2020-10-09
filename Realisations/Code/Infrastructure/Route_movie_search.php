<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
$_SESSION['action'] = $_POST['action'];

require_once '../../bootstrap.php';
$fp = fopen('log.txt', 'w');
fwrite($fp,  $_POST['action']. ' || '.  $_POST['text']);
fclose($fp);

use Code\Controller\MovieSearchController;


//$controller->getInfoMovie($_SESSION['id'], $_SESSION['post-data']['movie-selected']);

if(!empty($_SESSION['action'])){
    // fwrite($fp, ' c le session action ->' . $_SESSION['action']);
    //$controller = new MovieSearchController();
    //$controller->editUserMovie($_SESSION['action'], $_SESSION['post-data']['movie-selected'], $_SESSION['id']);
    
}
else{
    //header('Location: ../Views/MovieInfo/MovieInfo.php');
    
}
