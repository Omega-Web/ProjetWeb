<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
$_SESSION['post'] = $_POST;
$movie = [
    'title'=> $_POST['title'],
    'plot'=> $_POST['plot'],
    'duration'=> $_POST['duration'],
    'date'=> $_POST['date'],
];
require_once '../../bootstrap.php';

use Code\Controller\AdminController;

$controller = new AdminController();

if (!empty($_POST['action'])) {
    $controller->actionAdmin($_POST['action'], $_POST['userId'], $_POST['movieId'], $movie);
} else {
    header('Location: ../Views/Admin/Admin.php');
}
