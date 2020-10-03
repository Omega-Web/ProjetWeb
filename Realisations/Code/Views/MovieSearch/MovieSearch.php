<<<<<<< HEAD
<<<<<<< HEAD
<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
$_SESSION['id'];
require_once '../../../bootstrap.php';
use Code\Controller\MovieSearchController;
error_reporting(E_ALL);
ini_set("display_errors", 1);


$controller = new MovieSearchController();
$moviesLength = $controller->getMovies();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, recherche de films</title>
    <link rel="stylesheet" href="Styles/MovieSearch.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="div-logo">
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="MovieSearch.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a class="focus-nav" id="films-a" href="MovieSearch.php">Films</a></li>
                <li><a id="list-a" href="../UserMovieList/UserMovieList.php">Ma liste</a></li>
                <li><a id="account-a" href="../UserAccount/Informations.php">Mon compte</a></li>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Logout.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main id="main-div">
        <?php
        for ($i=0; $i < $moviesLength; $i++) { 
            # code...
            ?>
            <div class="card">
                <div class="div-img">
                    <img id="card-img" <?= 'src="data:image/jpeg;base64,'.$controller->getImageBase64($i).'"' ?> alt="imageMovie">
                </div>
                <div class="container">
                    <h4><b><?= $controller->getTitle($i) ?></b></h4>
                    <div>
                        <form action="../MovieInfo/MovieInfo.php" method="post">
                            <input type="text" name="movie-selected" value="<?= $controller->getId($i) ?>" hidden>
                            <button type="submit" id="seemore-btn">Plus</button>
                        </form>
                    </div>
                </div>
            </div> 
            <?php 
        }
        ?>
    </main>
<?php
=======
=======
>>>>>>> parent of 95d5c1c... resolve conflit
<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
$_SESSION['id'];
require_once '../../../bootstrap.php';
use Code\Controller\MovieSearchController;


$controller = new MovieSearchController();
$moviesLength = $controller->getMovies();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, recherche de films</title>
    <link rel="stylesheet" href="Styles/MovieSearch.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="div-logo">
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="MovieSearch.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a class="focus-nav" id="films-a" href="MovieSearch.php">Films</a></li>
                <li><a id="list-a" href="../UserMovieList/UserMovieList.php">Ma liste</a></li>
                <li><a id="account-a" href="../UserAccount/Informations.php">Mon compte</a></li>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Logout.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main id="main-div">
        <?php
        for ($i=0; $i < $moviesLength; $i++) { 
            # code...
            ?>
            <div class="card">
                <div class="div-img">
                    <img id="card-img" <?= 'src="data:image/jpeg;base64,'.$controller->getImageBase64($i).'"' ?> alt="imageMovie">
                </div>
                <div class="container">
                    <h4><b><?= $controller->getTitle($i) ?></b></h4>
                    <div>
                        <form action="../MovieInfo/MovieInfo.php" method="post">
                            <input type="text" name="movie-selected" value="<?= $controller->getId($i) ?>" hidden>
                            <button type="submit" id="seemore-btn">Plus</button>
                        </form>
                    </div>
                </div>
            </div> 
            <?php 
        }
        ?>
    </main>
<?php
<<<<<<< HEAD
>>>>>>> parent of 95d5c1c... resolve conflit
=======
>>>>>>> parent of 95d5c1c... resolve conflit
include '../footer.php';