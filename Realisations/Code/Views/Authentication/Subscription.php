<?php

namespace Code\Views\Authentication;

session_start();
$_SESSION['id'];
require_once '../../../bootstrap.php';

use Code\Controller\SubscriptionController;

$controller = new SubscriptionController();

error_reporting(E_ALL);
ini_set("display_errors", 1);


if (
    !empty($_POST['lastname']) && !empty($_POST['firstname'])
    && !empty($_POST['username']) && !empty($_POST['dob'])
    && !empty($_POST['password']) && !empty($_POST['email'])
) {
    $tabUser = array();
    $tabUser['firstname']   = $_POST['firstname'];
    $tabUser['lastname']    = $_POST['lastname'];
    $tabUser['username']    = $_POST['username'];
    $tabUser['password']    = $_POST['password'];
    $tabUser['email']       = $_POST['email'];
    $tabUser['birthday']    = $_POST['dob'];
    $tabUser['fk_user_type'] = 2; //Est un utilisateur

    $controller->createUser($tabUser);
    $controller->sendMail($tabUser['firstname'],$tabUser['email']);
    header('Location: ../Authentication/Connection.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="Styles/Subscription.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>
        <div id="div-logo">
            <a href="Subscription.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <!-- action="../MovieSearch/MovieSearch.php" A RAJOUTER ? -->
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
        <p class="connect-subscribe">Vous possédez déjà un compte ? Connectez-vous <a href="Connection.php">ici</a></p>
    <?php
    include '../footer.php';
}

    ?>