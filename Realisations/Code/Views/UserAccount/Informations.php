<?php

// require_once '../../Infrastructure/Database.class.php';
use Code\Infrastructure\Database;
use PDOException;
Use PDO;

error_reporting(E_ALL);
ini_set("display_errors", 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="Styles/Informations.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="div-logo">
            <img id="logo" src="../../Assets/logo.png" alt="logo">
        </div>
        <nav>
            <li><a href="#">Films</a></li>
            <li><a href="#">Ma liste</a></li>
            <li><a href="#">Mon compte</a></li>
        </nav>
        <div id="div-logout">
                <a href="#"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main>
        <div>
            <h3>Informations de compte</h3>
            <form id="first-form" action="post">
                <input id="firstname" name="firstname" placeholder="Prénom" disabled>
                <br>
                <input id="lastname" name="lastname" placeholder="Nom" disabled>
                <br>
                <input id="email" name="email" placeholder="Adresse e-mail">
                <br>
                <input id="dob" name="dob" placeholder="Date de naissance" disabled>
                <br>
                <input id="username" name="username" placeholder="Nom d'utilisateur" disabled>
                <br>
                <input id="password" name="password" type="password" placeholder="Mot de passe">
                <br>
            </form>
            
            <h3>Préférences cookies</h3>
            
            <form id="second-form" action="post">
            
                <div class="cookie" id="first-cookie">
                    <h5>Cookies indispensables</h5>
                    <span>Cookies utilisés pour faire fonctionner le site. Ces cookies ne sont pas désactivables</span>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="cookie" id="second-cookie">
                    <h5>Préférences</h5>
                    <span>Pour enregistrer vos préférences et améliorer votre expérience sur notre site</span>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="cookie" id="third-cookie">
                    <h5>Performances et annalyse</h5>
                    <span>Ces cookies sont utilisés pour collecter des informations sur la manière dont vous utilisez notre site mais aussi améliorer ses performances et votre expérience</span>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>

            <button id="button" type="submit">Enregistrer les modifications</button>
            </form>
        </div>
        
    </main>
    </body>
</html>
    <?php

 
?>

