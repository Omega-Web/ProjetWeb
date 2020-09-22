<?php

require_once '../../Model/User.class.php';
use Code\Model\User;
use PDOException;
Use PDO;

error_reporting(E_ALL);
ini_set("display_errors", 1);


if(!empty($_POST['lastname']) &&!empty($_POST['firstname']) &&!empty($_POST['username']) &&!empty($_POST['dob']) && !empty($_POST['password'])) {
    $tabUser = array();
    $tabUser['firstname']   = $_POST['firstname'];
    $tabUser['lastname']    = $_POST['lastname'];
    $tabUser['username']    = $_POST['username'];
    $tabUser['password']    = $_POST['password '];
    $tabUser['birthday']    = $_POST['dob'];

    $newUser = new User($tabUser);
    print_r($newUser);
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="Styles/Subscription.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <div id="div-logo">
        <img id="logo" src="../../../design/logoWEB2.png" alt="">
    </div>
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
        <button id="button" type="submit">Se connecter</button>
        </form>
        <p class="connect-subscribe">Vous ne possédez pas encore de compte ? Inscrivez-vous <a href="Connection.php">ici</a></p>
    
    <footer>
        <ul class="wrapper">
            <li class="one"><a href="">CGU</a></li>
            <li class="two"><a href="">Mentions légales</a></li>
            <li class="three"><a href="">FAQ</a></li>
        </ul>
    </footer>

    </body>
</html>
    <?php
}
 
?>

