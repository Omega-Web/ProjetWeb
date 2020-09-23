<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
// require_once '../../Infrastructure/Database.class.php';
require_once '../../../bootstrap.php';

use Code\Model\User;
use Code\Repository\UserRepository;
use Code\Infrastructure\Database;
use PDOException;
use PDO;

// $id = 2;

// $repoUser = new UserRepository(Database::get());
// $currentUser = $repoUser->findOne($id);

// if($id > 0 ) {
//     $firstname      = $currentUser->getFirstname();    
//     $lastname       = $currentUser->getLastname();    
//     $username       = $currentUser->getUsername();    
//     $email          = $currentUser->getEmail();    
//     $password       = $currentUser->getPassword();    
//     $dob            = $currentUser->getBirthday();    
//}
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
                <input id="firstname" name="firstname" placeholder="Prénom" value=".$firstname." disabled>
                <br>
                <input id="lastname" name="lastname" placeholder="Nom" value=".$lastname." disabled>
                <br>
                <input id="email" name="email" placeholder="Adresse e-mail" value=".$email.">
                <br>
                <input id="dob" name="dob" placeholder="Date de naissance" value=".$dob." disabled>
                <br>
                <input id="username" name="username" placeholder="Nom d'utilisateur" value=".$username." disabled>
                <br>
                <input id="password" name="password" type="password" placeholder="Mot de passe" value=".$password.">
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

