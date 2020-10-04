<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}
$_SESSION['id'];
$_SESSION['post-data'] = $_POST;

require_once '../../../bootstrap.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

use Code\Controller\MovieInfoController;

if (!empty($_SESSION['post-data']['movie-selected'])) {
    $controller = new MovieInfoController();
    $controller->getInfoMovie($_SESSION['id'], $_SESSION['post-data']['movie-selected']);
    // if (!empty($_POST['comment'])) {
    //     $controller->updateComment($_POST['comment']);
    // }
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VidéoMega, <?= $controller->getTitle() ?></title>
        <link rel="stylesheet" href="Styles/MovieInfo.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <a href="../Authentication/Logout.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
            </div>
        </header>
        <main id="main-div">
            <div class="movie">
                <div class="div-img">
                    <img id="card-img" <?= 'src="data:image/jpeg;base64,' . $controller->getImageBase64() . '"' ?> alt="imageMovie">
                </div>
                <div class="div-title">
                    <h2 id="title"><b><?= $controller->getTitle() ?></b></h2>
                </div>
                <div class="container">
                    <img class="submit-img active" name="watch_state" src="<?= $controller->getWatchState() ?>" />
                    <button id="add-to-list-btn" name="add-to-list-btn">
                        <?= $controller->isMovieInList() ?>
                    </button>
                </div>
                <div class="movie-plot">
                    <p><?= $controller->getPlot() ?></p>
                </div>
                <div class="movie-comment">
                    <h3>Commentaire :</h3>
                    <form method="post">
                        <textarea id="comment-textarea" rows="5" type="textarea" name="comment" placeholder="Entrez un commentaire sur le film"><?= $controller->getComment() ?></textarea>
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
                                            echo $actor->getFirstname() . ' ' . $actor->getLastname() . ' ';
                                        }
                                        ?></p>
                </div>
                <div class="movie-genre">
                    <h3>Genre : </h3>
                    <p class="movie-p"><?php
                                        $genreArray = $controller->getGenres();
                                        foreach ($genreArray as $genre) {
                                            echo $genre->getName() . ' ';
                                        } ?>
                    </p>
                </div>
            </div>
        </main>
        <script>
            $(function updateWatchState() {
                $img = $(".submit-img");
                $img.on('click', function() {
                    $.ajax({
                        type: 'POST',
                        url: '../../Infrastructure/Route.php',
                        data: {
                            action: 'updateWatchState'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $img.attr('src', response.image);
                        }
                    })
                })
            });
            $(function addToList() {
                $btn = $("#add-to-list-btn");
                $btn.on('click', function() {
                    $.ajax({
                        type: 'POST',
                        url: '../../Infrastructure/Route.php',
                        data: {
                            action: 'addToList'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $btn.html(response.text);
                        }
                    })
                })
            });
            $(function updateComment() {
                $btn = $("#movie-comment-btn");
                $btn.on('click', function(e) {
                    e.preventDefault();
                    $textarea_value = $("#comment-textarea").val();
                    $.ajax({
                        type: 'POST',
                        url: '../../Infrastructure/Route.php',
                        data: {
                            action: $textarea_value,
                        },
                        dataType: 'json',
                        success: function(response) {
                            $btn.html(response.text);
                        }
                    })
                })
            });
        </script>
    </body>

    </html>
<?php
}
?>