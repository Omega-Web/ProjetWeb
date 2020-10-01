<?php 

require_once '../../../bootstrap.php';

use Code\Controller\MovieInfoController;
use PDO;
use PDOException;
use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Service\MovieService;
use Code\Service\Movie_userService;
use Code\Repository\Movie_staffRepository;
use Code\Repository\Movie_userRepository;
use Code\Repository\StaffRepository;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$movieImageRepo = new Movie_imageRepository(Database::get());
$genreRepo = new GenreRepository(Database::get());
$movieRepo = new MovieRepository(Database::get());
$movieStaffRepo = new Movie_staffRepository(Database::get());
$staffRepo = new StaffRepository(Database::get());
$movieUserRepo = new Movie_userRepository(Database::get());
$service = new MovieService($movieRepo,$genreRepo,$movieImageRepo, $movieStaffRepo, $staffRepo);

$movieUserService = new Movie_userService($movieUserRepo, $movieRepo);



if(!empty($_POST['movie-selected'])){
    $controller = new MovieInfoController();
    $controller->getInfoMovie(1,$_POST['movie-selected']);
    /*$movie = $service->findOne($_POST['movie-selected']);
    // HAVE TO ADD SESSION ID FOR ->
    $userMovie = $movieUserService->findOne(1, $_POST['movie-selected']);*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, <?= $controller->getTitle() ?></title>
    <link rel="stylesheet" href="Styles/MovieInfo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="div-logo">
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="../MovieSearch/MovieSearch.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a id="films-a" href="../MovieSearch/MovieSearch.php">Films</a></li>
                <li><a id="list-a" href="../UserMovieList/UserMovieList.php">Ma liste</a></li>
                <li><a id="account-a" href="../UserAccount/Informations.php">Mon compte</a></li>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Connection.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main id="main-div">
            <div class="movie">
                <div class="div-img">
                    <img id="card-img" <?= 'src="data:image/jpeg;base64,'.$controller->getImageBase64().'"' ?> alt="imageMovie">
                </div>
                <div class="div-title">
                    <h2 id="title"><b><?= $movie->getTitle() ?></b></h2>
                </div>
                <form id="form-movieinfo" action="updateUserMovie.php?id=<?=$_GET['id']?>" method="post">
                    <label class="label" for="watch_state" id="labelup">
                            <input class="radio" type="radio" name="watch_state" id="seen"/>
                            <input class="seen-img submit-img" type="image" name="watch_state" src="../../Assets/eye.svg" alt="Submit"/>
                    </label>
                    <button id="add-to-list-btn" value="<?= $movie->getId() ?>" type="submit">Ajouter</button>
                    <div>
                        <label class="label" for="up" id="labelup">
                            <input class="radio" type="radio" name="up" value="up" id="up"/>
                            <input class="submit-img" type="image" name="personal_ranking" src="../../Assets/like.svg" alt="Submit"/>
                        </label>
                        <label class="label" for="down" id="labeldown">
                            <input class="radio" type="radio" name="down" value="down" id="down"/>
                            <input class="submit-img" type="image" name="personal_ranking" src="../../Assets/dislike.svg" alt="Submit"/>
                        </label>
                    </div>
                </form>
                <div class="movie-plot">
                    <p><?= $movie->getPlot() ?></p>
                </div>
                <div class="movie-comment">
                    <h3>Commentaire :</h3>
                    <form action="updateUserMovie.php?id=<?=$_GET['id']?>" method="post">
                        <textarea rows="5" type="textarea" name="comment" placeholder="Entrez un commentaire sur le film"><?php
                        echo $userMovie->getComment();
                        ?></textarea>
                        <button id="movie-comment-btn" type="submit">Enregistrer le commentaire</button>
                    </form>
                </div>
                <div class="movie-year">
                    <h3>Année : </h3>
                    <p class="movie-p"><?= $movie->getDate()->format('d M Y') ?></p>
                </div>
                <div class="movie-duration">
                    <h3>Durée : </h3>
                    <p class="movie-p"><?= $movie->getDuration() ?></p>
                </div>
                <div class="movie-casting">
                    <h3>Casting : </h3>
                    <p class="movie-p"><?php
                    $arrayStaff = $movie->getStaffs();
                    foreach ($arrayStaff as $actor) {
                        echo $actor->getFirstname() . ' ' .  $actor->getLastname() . ' ';
                    }
                    ?></p>
                </div>
                <div class="movie-genre">
                    <h3>Genre : </h3>
                    <p class="movie-p"><?php 
                    $genreArray = $movie->getGenres();
                    foreach($genreArray as $genre) {
                        echo $genre->getName() . ' ';
                    }?>
                    </p>
                </div>
            </div> 
        </main>
</body>
</html>
<?php
}
?>

