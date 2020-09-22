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
        $sql = 'SELECT SQL_SMALL_RESULT id, username FROM user WHERE username=:name AND password=:pwd LIMIT 1';
        $stt = $con->prepare($sql);
        $stt->bindValue('name', $_POST['username'], PDO::PARAM_STR);
        $stt->bindValue('pwd', $_POST['password'], PDO::PARAM_STR);
        $stt->execute();
        $user = $stt->fetch(PDO::FETCH_ASSOC);
        if ($user){
            echo 'Bienvenue ' . $user['username'];
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
    <title>Connexion</title>
    <link rel="stylesheet" href="Styles/Connection.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <div id="div-logo">
        <img id="logo" src="../../Assets/logo.png" alt="logo">
    </div>
    <form method="post">
        <input id="username" name="username" placeholder="Nom d'utilisateur">
        <br>
        <input id="password" name="password" type="password" placeholder="Mot de passe">
        <br>
        <button type="submit">Se connecter</button>
        </form>
        <p class="connect-subscribe">Vous ne possédez pas encore de compte ? Inscrivez-vous <a href="Subscription.php">ici</a></p>
    
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

