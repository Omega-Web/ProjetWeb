<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
$_SESSION['action'] = $_POST['action'];
$_SESSION['comment'] = $_POST['newComment'];
$fp = fopen('log.txt', 'w');
fwrite($fp, $_SESSION['action'] . ' <-- le session action    ----- le session comment --> '. $_SESSION['comment'] . PHP_EOL);
fwrite($fp, $_POST['action'] . ' <-- le post action    ----- le post comment --> '. $_POST['newComment'] . PHP_EOL);
fclose($fp);

require_once '../../bootstrap.php';

use Code\Controller\MovieInfoController;

$controller = new MovieInfoController();
$controller->getInfoMovie($_SESSION['id'], $_SESSION['post-data']['movie-selected']);

if (!empty($_SESSION['action'])) {
    // fwrite($fp, ' c le session action ->' . $_SESSION['action']);
    $controller->editUserMovie($_SESSION['action'], $_SESSION['post-data']['movie-selected'], $_SESSION['id'], $_SESSION['comment']);
} else {
    header('Location: ../Views/MovieInfo/MovieInfo.php');
}
