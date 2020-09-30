<?php 

require_once '../../../bootstrap.php';
use PDO;
use PDOException;
use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\Movie_staffRepository;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;
use Code\Service\MovieService;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$movieImageRepo = new Movie_imageRepository(Database::get());
$genreRepo = new GenreRepository(Database::get());
$movieRepo = new MovieRepository(Database::get());
$movieStaffRepo = new Movie_staffRepository(Database::get());
$staffRepo = new StaffRepository(Database::get());
$service = new MovieService($movieRepo,$genreRepo,$movieImageRepo, $movieStaffRepo, $staffRepo);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, Ma liste de films</title>
    <link rel="stylesheet" href="Styles/UserMovieList.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="div-logo">
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="UserMovieList.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a id="films-a" href="../MovieSearch/MovieSearch.php">Films</a></li>
                <li><a class="focus-nav" id="list-a" href="UserMovieList.php">Ma liste</a></li>
                <li><a id="account-a" href="../UserAccount/Informations.php">Mon compte</a></li>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Connection.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main id="main-div">
        <?php
        $movies = $service->findAll();
        foreach ($movies as $movie) {
            ?>
            <div class="card">
                <img id="card-img" <?= 'src="data:image/jpeg;base64,'.base64_encode( $movie->getImages()[0]['image']).'"' ?> alt="Avatar">
                <div class="container">
                    <h4><b><?= $movie->getTitle() ?></b></h4>
                    <div>
                        <a href="#"><img id="seen-img" src="../../Assets/eye.svg" alt="seen"></a>
                        <a href="#"><button id="seemore-btn" type="button">Plus</button></a>
                    </div>
                </div>
            </div> 
            <?php 
        }
        ?>
    </main>
</body>
</html>