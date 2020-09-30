<?php 

require_once '../../../bootstrap.php';

use Code\Controller\MovieInfoController;

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$controller = new MovieInfoController();

if(!empty($_POST['movie-selected'])){
    $controller->getInfoMovie(1,$_POST['movie-selected']);
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
                    <h2 id="title"><b><?= $controller->getTitle() ?></b></h2>
                </div>
                <form id="form-movieinfo" action="updateUserMovie.php?id=<?=$_GET['id']?>" method="post">
                    <label class="label" for="watch_state" id="labelup">
                            <input class="radio" type="radio" name="watch_state" id="seen"/>
                            <input class="seen-img submit-img" type="image" name="watch_state" src="../../Assets/eye.svg" alt="Submit"/>
                    </label>
                    <button id="add-to-list-btn" value="<?= $controller->getId() ?>" type="submit">Ajouter</button>
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
                    <p><?= $controller->getPlot() ?></p>
                </div>
                <div class="movie-comment">
                    <h3>Commentaire :</h3>
                    <form action="updateUserMovie.php?id=<?=$_GET['id']?>" method="post">
                        <textarea rows="5" type="textarea" name="comment" placeholder="Entrez un commentaire sur le film"><?= $controller->getComment();?></textarea>
                        <button id="movie-comment-btn" type="submit">Enregistrer le commentaire</button>
                    </form>
                </div>
                <div class="movie-year">
                    <h3>Année : </h3>
                    <p class="movie-p"><?= $controller->getDate() ?></p>
                </div>
                <div class="movie-duration">
                    <h3>Durée : </h3>
                    <p class="movie-p"><?= $controller->getDuration() ?></p>
                </div>
                <div class="movie-casting">
                    <h3>Casting : </h3>
                    <p class="movie-p"><?php
                    $arrayStaff = $controller->getStaffs();
                    foreach ($arrayStaff as $actor) {
                        echo $actor->getFirstname() . ' ' .  $actor->getLastname() . ' ';
                    }
                    ?></p>
                </div>
                <div class="movie-genre">
                    <h3>Genre : </h3>
                    <p class="movie-p"><?php 
                    $genreArray = $controller->getGenres();
                    foreach($genreArray as $genre) {
                        echo $genre->getName() . ' ';
                    }?>
                    </p>
                </div>
            </div> 
        </main>
        <?php
}
include '../footer.php';
?>

