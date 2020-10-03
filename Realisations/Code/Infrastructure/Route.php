<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}

require_once '../../bootstrap.php';

use Code\Controller\MovieInfoController;

$_SESSION['action'] = $_POST['action'];

if (!empty($_POST['comment'])) {
    $_SESSION['comment'] = $_POST['comment'];
}

$controller = new MovieInfoController();
$controller->getInfoMovie($_SESSION['id'], $_SESSION['post-data']['movie-selected']);

if (!empty($_SESSION['action'])) {
    $controller->editUserMovie($_SESSION['action'], $_SESSION['post-data']['movie-selected'], $_SESSION['id']);
} else {
    // header('Location: ../Views/MovieInfo/MovieInfo.php');
}
