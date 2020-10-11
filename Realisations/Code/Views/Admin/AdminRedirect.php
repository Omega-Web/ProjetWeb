<?php
session_start();

require_once '../../../bootstrap.php';

if (!isset($_SESSION['id']) && ($_SESSION['id_usertype'] == 2 || $_SESSION['id_usertype'] == 0)) {
    header('Location: ../Authentication/Connection.php');
} else {
?>
    <!-- Html -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VidéoMega -- Admin</title>
        <link rel="stylesheet" href="Styles/AdminRedirect.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="div-logo">
                <a href="Connection.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
            </div>
        </header>
        <main>
            <div id="grid">
                <div class="element" id="first">
                    <a href="../MovieSearch/MovieSearch.php">
                        <h1>VidéoMéga</h1>
                    </a>
                    <a href="Admin.php">
                        <h1>Admin</h1>
                    </a>
                </div>
                <div id="second">
                    <a class="element" id="logout-a" href="../Authentication/Logout.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
                </div>
            </div>
        </main>
    <?php
}
    ?>