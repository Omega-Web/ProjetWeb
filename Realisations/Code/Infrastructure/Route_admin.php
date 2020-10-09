<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
// $_SESSION['action'] = $_POST['action'];


require_once '../../bootstrap.php';

use Code\Controller\AdminController;

$controller = new AdminController();
// $controller->getInfoMovie($_SESSION['id'], $_SESSION['post-data']['movie-selected']);

if (!empty($_POST['action'])) {
    $controller->actionAdmin($_POST['action'], $_POST['userId']);
} else {
    header('Location: ../Views/Admin/Admin.php');
}
