<?php

require_once '../../Infrastructure/Database.class.php';
use Code\Infrastructure\Database;
use PDOException;
Use PDO;

error_reporting(E_ALL);
ini_set("display_errors", 1);



if(!empty($_POST['username']) && !empty($_POST['password'])) {
    try{
        $con = Database::get();
        $sql = 'SELECT SQL_SMALL_RESULT id, pseudo FROM user WHERE pseudo=:name AND password=:pwd LIMIT 1';
        $stt = $con->prepare($sql);
        $stt->bindValue('name', $_POST['username'], PDO::PARAM_STR);
        $stt->bindValue('pwd', $_POST['password'], PDO::PARAM_STR);
        $stt->execute();
        $user = $stt->fetch(PDO::FETCH_ASSOC);
        if ($user){
            echo 'Bienvenue ' . $user['pseudo'];
        } else {
            echo 'Le nom d\'utilisateur ou l\'identifiant est érroné';
        }
    } catch (PDOException $e) {
        die($e->getMessage());
}

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
        <input id="dob" name="dob" placeholder="Date de naissance">
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

