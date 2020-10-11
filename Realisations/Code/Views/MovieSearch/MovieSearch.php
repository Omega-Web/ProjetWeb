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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/54cfee3e64.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div id="div-logo">
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="MovieSearch.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav class="topnav">
            <ul id="ul-nav">
                <li><a class="focus-nav" id="films-a" href="MovieSearch.php">Films</a></li>
                <li><a id="list-a" href="../UserMovieList/UserMovieList.php">Ma liste</a></li>
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id_usertype'] == 2) {
                ?>
                    <li><a id="account-a" href="../UserAccount/Informations.php">Mon compte</a></li>
                <?php
                } else if (isset($_SESSION['id']) && $_SESSION['id_usertype'] == 1) {
                ?>
                    <li><a id="account-a" href="../UserAccount/Informations.php">Admin</a></li>
                <?php
                } else {
                    header('Location: ../Authentication/Connection.php');
                }
                ?>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
            <a href="../Authentication/Logout.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main id="main-div">
        <div id="search-bar-div">
            <input type="text" id="movie-search-input" value="" />
            <button type="submit" id="search-btn"><span id="span-search">Rechercher</span><i  id="fasearch" class="fas fa-search"></i></button>

        </div>
        <?php
        for ($i = 0; $i < $moviesLength; $i++) {

        ?>
            <div class="card">
                <div class="div-img">
                    <img id="card-img" <?= 'src="data:image/jpeg;base64,' . $controller->getImageBase64($i) . '"' ?> alt="imageMovie" />
                </div>
                <div class="container">
                    <h4 class="title"><b><?= $controller->getTitle($i) ?></b></h4>
                    <p><?= $controller->getPlot($i) ?></p>
                    <form action="../MovieInfo/MovieInfo.php" method="post">
                        <input type="text" name="movie-selected" value="<?= $controller->getId($i) ?>" hidden />
                        <button type="submit" id="seemore-btn">Plus</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </main>
    <script>
        $(function SearchMovie() {
            $btn = $("#search-btn");
            $btn.on('click', function() {
                //e.preventDefault();
                $textarea_value = $("#movie-search-input").val();
                $.ajax({
                    type: 'POST',
                    url: '../../Infrastructure/Route_movie_search.php',
                    data: {
                        action: 'search_movie',
                        text: $textarea_value
                    },

                    dataType: 'json',

                    success: function(response) {
                        //$btn.html(response.text);
                        $(".card").remove();
                        $("#main-div").append(response.html);


                    }


                })
            })
        });
    </script>
</body>

</html>
<?php
include '../footer.php';
