<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, Admin</title>
    <link rel="stylesheet" href="Styles/Admin.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div>
            <h1>Admin</h1>
            <div id="div-logout">
                <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                    <a href="../Authentication/Connection.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="#add-user">Add user</a></li>
                <li> | </li>
                <li><a href="#update-user"> Update user</a></li>
                <li> | </li>
                <li><a href="#delete-user">Delete user</a></li>
                <li> | </li>
                <li><a href="#add-movie">Add Movie</a></li>
                <li> | </li>
                <li><a href="#update-movie">Update Movie</a></li>
                <li> | </li>
                <li><a href="#delete-movie">Delete Movie</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="user">
            <div>
                <h1 id="add-user">Add user</h1>
                <form method="post">
                    <input id="firstname" name="firstname" placeholder="Prénom">
                    <br>
                    <input id="lastname" name="lastname" placeholder="Nom">
                    <br>
                    <input id="email" name="email" placeholder="Adresse e-mail">
                    <br>
                    <input id="dob" name="dob" type="date" placeholder="Date de naissance">
                    <br>
                    <input id="username" name="username" placeholder="Nom d'utilisateur">
                    <br>
                    <input id="password" name="password" type="password" placeholder="Mot de passe">
                    <br>
                    <button id="button" type="submit">S'inscrire</button>
                </form>
            </div>
            <div>
                <h1 id="update-user">Update user</h1>
                <form id="first-form" method="post">
                    <input id="firstname" name="firstname" placeholder="Prénom" disabled>
                    <br>
                    <input id="lastname" name="lastname" placeholder="Nom" disabled>
                    <br>
                    <input id="email" name="email" placeholder="Adresse e-mail">
                    <br>
                    <input id="dob" name="dob" type="date" placeholder="Date de naissance" disabled>
                    <br>
                    <input id="username" name="username" placeholder="Nom d'utilisateur" disabled>
                    <br>
                    <input id="password" name="password" type="password" placeholder="Mot de passe">
                    <br>
                    <label for="password"></label>
                    <input id="password2" name="password2" type="password" placeholder="Vérifier le mot de passe">
                    <br>
                    <button id="button-info" type="submit">Enregistrer les modifications</button>
                </form>

            </div>
            <div>
                <h1 id="delete-user">Delete user</h1>
                <form method="post">
                    <input type="text">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        </div>

        <div class="movie">
            <div>
                <h1 id="add-movie">Add movie</h1>
                
            </div>
            <div>
                <h1 id="update-movie">Update Movie</h1>
            </div>
            <div>
                <h1 id="delete-movie">Delete Movie</h1>
            </div>
        </div>
    </main>
</body>
<?php
include '../footer.php';