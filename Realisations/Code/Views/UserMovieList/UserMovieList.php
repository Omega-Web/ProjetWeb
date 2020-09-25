<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, Ma liste de films</title>
    <link rel="stylesheet" href="Styles/UserMovieList.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        <div id="div-logo">
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="UserMovieList.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a id="films-a" href="#">Films</a></li>
                <li><a id="list-a" href="UserMovieList.php">Ma liste</a></li>
                <li><a id="account-a" href="../UserAccount/Informations.php">Mon compte</a></li>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Connection.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main id="main-div">
        <div class="card">
            <img id="card-img" src="../../Assets/avengers.jpg" alt="Avatar">
            <div class="container">
                <h4><b>Avengers: Endgame</b></h4>
                <div>
                    <a href="#"><img id="seen-img" src="../../Assets/eye.svg" alt="seen"></a>
                    <a href="#"><button id="seemore-btn" type="button">Plus</button></a>
                </div>
            </div>
        </div> 
    </main>


