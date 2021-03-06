<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../Authentication/Connection.php');
}

$_SESSION['id'];
require_once '../../../bootstrap.php';

use Code\Controller\AdminController;

error_reporting(E_ALL);
ini_set("display_errors", 1);


$controller = new AdminController();
$genres = $controller->getGenres();
$movies = $controller->getMovies();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, Admin</title>
    <link rel="stylesheet" href="Styles/Admin.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <header>
        <div>
            <h1><a href="../MovieSearch/MovieSearch.php">Retour vers VidéoMéga</a></h1>
            <h1>Admin</h1>
            <div id="div-logout">
                <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Logout.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
            </div>
        </div>
    </header>
    <main>
        <div id="user">
            <div id="delete-user-div">
                <h1 id="delete-user-title">Supprimer un utilisateur</h1>
                <form method="post">
                    <label for="id-username">Identifiant :</label>
                    <input type="text" name="id_username" id="id_username" placeholder="Id Utilisateur">
                    <button type="submit" id="submit_delete_user">Supprimer</button>
                </form>
            </div>
        </div>
        <div id="movie">
            <div id="add-update">
                <div id="add-movie-div">
                    <h1 id="add-movie-title">Ajouter un film</h1>
                    <form method="post" enctype="multipart/form-data">
                        <div>
                            <label for="title">Titre :</label>
                            <input type="text" id="add_title" name="title" placeholder="Titre" required>
                        </div>
                        <div>
                            <label for="plot">Description :</label>
                            <input type="text" id="add_plot" name="plot" placeholder="Description" required>
                        </div>
                        <div>
                            <label for="duration">Durée :</label>
                            <input type="text" id="add_duration" name="duration" placeholder="00:00:00" required>
                        </div>
                        <div>
                            <label for="date">Année :</label>
                            <input type="date" id="add_date" name="date" placeholder="Année" required>
                        </div>
                        <div>
                            <label for="img">Affiche :</label>
                            <input type="file" id="add_img" name="img" accept="image/png, image/jpeg" required>
                        </div>
                        <div>
                            <label for="genre">Genre :</label>
                            <select id="add_genre" name="genre" multiple="multiple">
                                <option value="">-- Genre --</option>
                                <?php
                                foreach ($genres as $genre) {
                                ?>
                                    <option value="<?= $genre->getId() ?>"><?= $genre->getId() . ' | ' . $genre->getName() ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" id="submit_add_movie">Ajouter</button>
                        <br>
                        <span id="add_success"></span>
                    </form>
                </div>
                <div id="update-movie-div">
                    <h1 id="update-movie-title">Modifier un film</h1>
                    <form>
                        <div>
                            <label for="genre">Identifiant :</label>
                            <select id="update_idMovie" name="genre">
                                <option value="">-- Id | Movie--</option>
                                <?php
                                foreach ($movies as $movie) {
                                ?>
                                    <option value="<?= $movie->getId() ?>"><?= $movie->getId() . ' | ' . $movie->getTitle() ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="title">Titre :</label>
                            <input type="text" id="update_title" name="title" placeholder="Titre" required>
                        </div>
                        <div>
                            <label for="plot">Description :</label>
                            <input type="text" id="update_plot" name="plot" placeholder="Description" required>
                        </div>
                        <div>
                            <label for="duration">Durée :</label>
                            <input type="text" id="update_duration" name="duration" placeholder="Durée" required>
                        </div>
                        <div>
                            <label for="date">Année :</label>
                            <input type="text" id="update_date" name="date" placeholder="Année" required>
                        </div>
                        <div>
                            <label for="img">Affiche :</label>
                            <input type="file" id="update_img" name="img" accept="image/png, image/jpeg">
                        </div>
                        <div>
                            <label for="genre">Genre :</label>
                            <select name="genre" id="update_idGenre" multiple="multiple">
                                <option value="">-- Genre --</option>
                                <?php
                                foreach ($genres as $genre) {
                                ?>
                                    <option value="<?= $genre->getId() ?>"><?= $genre->getId() . ' | ' . $genre->getName() ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" id="submit-update-movie">Modifier</button>
                    </form>
                </div>
            </div>
            <div id="delete-movie-div">
                <h1 id="delete-movie-title">Supprimer un film</h1>
                <form>
                    <label for="id_movie">Identifiant :</label>
                    <input type="text" name="id_movie" id="id_movie" placeholder="Id Film">
                    <button id="submit-delete-movie" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </main>
    <script>
        $(function deleteUser() {
            $btn = $('#submit_delete_user');
            $btn.on('click', function(e) {
                e.preventDefault();
                $userId = $('#id_username');
                $.ajax({
                    type: 'POST',
                    url: '../../Infrastructure/Route_admin.php',
                    data: {
                        action: 'deleteUser',
                        userId: $userId.val(),
                    },
                    dataType: 'json',
                    success: function(response) {
                        $userId.val(response.text)
                    }
                })
            })
        });
        $(function addMovie() {
            $btn = $('#submit_add_movie');
            $btn.on('click', function(e) {
                e.preventDefault();
                var fd = new FormData();
                var files = $('#add_img')[0].files[0];
                fd.append('title', $('#add_title').val());
                fd.append('plot', $('#add_plot').val());
                fd.append('duration', $('#add_duration').val());
                fd.append('date', $('#add_date').val());
                fd.append('file', files);
                fd.append('action', 'addMovie');
                fd.append('genre', $('#add_genre').val())
                $.ajax({
                        type: 'post',
                        url: '../../Infrastructure/Route_admin.php',
                        data: fd,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                    })
                    .done(function(response) {
                        $('#add_success').html(response.text)
                    })
            })
        });
        $(document).on("change", "#update_idMovie", function() {
            // $select = $('#update_idMovie');
            // $select.on('change', function() {
            idMovie = $('#update_idMovie option:selected').val()
            $.ajax({
                    type: 'post',
                    url: '../../Infrastructure/Route_admin.php',
                    data: {
                        action: 'fillUpdateMovieForm',
                        movieId: idMovie,
                    },
                    dataType: 'json',
                })
                .done(function(response) {
                    $('#update_title').val(response.title)
                    $('#update_plot').val(response.plot)
                    $('#update_duration').val(response.duration)
                    $('#update_date').val(response.date)
                    $('#update_idGenre').val(response.genre)
                })

        });
        $(function updateMovie() {
            $btn = $('#submit-update-movie');
            $btn.on('click', function(e) {
                e.preventDefault();
                var fd = new FormData();
                var files = $('#add_img')[0].files[0];
                fd.append('id', $('#update_idMovie option:selected').val());
                fd.append('title', $('#update_title').val());
                fd.append('plot', $('#update_plot').val());
                fd.append('duration', $('#update_duration').val());
                fd.append('date', $('#update_date').val());
                fd.append('file', files);
                fd.append('action', 'updateMovie');
                fd.append('genre', $('#update_idGenre').val())
                $.ajax({
                        type: 'post',
                        url: '../../Infrastructure/Route_admin.php',
                        data: fd,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                    })
                    .done(function(response) {
                        $('#update_success').html(response.text)
                    })
            })
        });
        $(function deleteMovie() {
            $btn = $("#submit-delete-movie");
            $btn.on('click', function(e) {
                e.preventDefault();
                $movieId = $('#id_movie');
                $.ajax({
                    type: 'POST',
                    url: '../../Infrastructure/Route_admin.php',
                    data: {
                        action: 'deleteMovie',
                        movieId: $movieId.val(),
                    },
                    dataType: 'json',
                    success: function(response) {
                        $movieId.val(response.text)
                    }
                })
            })
        });
    </script>
</body>
<?php
include '../footer.php';
