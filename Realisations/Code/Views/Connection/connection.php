<?php

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
            echo 'coucou ' . $user['username'];
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
    <link rel="stylesheet" href="connection.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
<form method="post">
    <input id="username" name="username" placeholder="Nom d'utilisateur">
    <br>
    <input id="password" name="password" type="password" placeholder="Mot de passe">
    <br>
    <button type="submit">Se connecter</button>
    </form>
</body>
</html>
    <?php
}
 
?>

