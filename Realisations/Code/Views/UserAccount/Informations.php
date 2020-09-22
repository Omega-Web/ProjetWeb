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
            <li><a href="#">Mes informations</a></li>
        </nav>
        <div id="div-logout">
                <img id="logout" src="../../Assets/logout.svg" alt="logout">
        </div>
    </header>
    </body>
</html>
    <?php

 
?>

