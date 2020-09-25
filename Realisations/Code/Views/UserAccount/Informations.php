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

$id = 2;

$repoUser = new UserRepository(Database::get());
$currentUser = $repoUser->findOne($id);

if($id > 0 ) {
    $userInfo = array(
    'firstname'      => $currentUser->getFirstname(),  
    'lastname'       => $currentUser->getLastname(),    
    'username'       => $currentUser->getUsername(),    
    'email'          => $currentUser->getEmail(), 
    'password'       => $currentUser->getPassword(),    
    'dob'            => $currentUser->getBirthday()->format('Y-m-d')
    ) ;
    print_r($userInfo);
}
$passwordError = "";
if(!empty($_POST)) {

    $userArray['email'] = $_POST['email'];
    $userArray['id'] = $id;

    if ($_POST['password'] === $_POST['password2']){
        $userArray['password'] = $_POST['password'];
        try{
            $repoUser->updateUser(new User($userArray));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    else{
        $passwordError = "Les mots de passe ne correspondent pas";
    }
    

}

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
            <!-- ADD PHP HERE -- If clicked on logo while identified take on Films search page -->
            <a href="../Authentication/Connection.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a id="films-a" href="#">Films</a></li>
                <li><a id="list-a" href="#">Ma liste</a></li>
                <li><a id="account-a" href="#">Mon compte</a></li>
            </ul>
        </nav>
        <div id="div-logout">
            <!-- ADD PHP HERE -- LOGOUT / SESSION END-DESTROY ? -->
                <a href="../Authentication/Connection.php"><img id="logout" src="../../Assets/logout.svg" alt="logout"></a>
        </div>
    </header>
    <main>
        <div id="main-div">
            <h3>Informations de compte</h3>
            <form id="first-form" action="" method="post">
                <input id="firstname" name="firstname" placeholder="Prénom" value="<?php echo htmlspecialchars($userInfo['firstname']); ?>" disabled>
                <br>
                <input id="lastname" name="lastname" placeholder="Nom" value="<?php echo htmlspecialchars($userInfo['lastname']); ?>" disabled>
                <br>
                <input id="email" name="email" placeholder="Adresse e-mail" value="<?php echo htmlspecialchars($userInfo['email']); ?>">
                <br>
                <input id="dob" name="dob" type="date" placeholder="Date de naissance" value="<?php echo htmlspecialchars($userInfo['dob']); ?>" disabled>
                <br>
                <input id="username" name="username" placeholder="Nom d'utilisateur" value="<?php echo htmlspecialchars($userInfo['username']); ?>" disabled>
                <br>
                <input id="password" name="password" type="password" placeholder="Mot de passe" >
                <br>
                <label for="password"><?php echo $passwordError; ?></label>
                <input id="password2" name="password2" type="password" placeholder="Vérifier le mot de passe">
                <br>
                <!-- <button type="submit">ghgh</button> -->
            </form>
            
            <h3>Préférences cookies</h3>
            
            <form id="second-form" action="" method="post">
            
                <div class="cookie" id="first-cookie">
                    <div>
                        <h5>Cookies indispensables</h5>
                        <span>Cookies utilisés pour faire fonctionner le site. Ces cookies ne sont pas désactivables</span>
                    </div>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox" checked disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="cookie" id="second-cookie">
                    <div>
                        <h5>Préférences</h5>
                        <span>Pour enregistrer vos préférences et améliorer votre expérience sur notre site</span>                    
                    </div>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="cookie" id="third-cookie">
                    <div>
                        <h5>Performances et annalyse</h5>
                        <span>Ces cookies sont utilisés pour collecter des informations sur la manière dont vous utilisez notre site mais aussi améliorer ses performances et votre expérience</span>
                    </div>
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div> 
            </form>
            <button id="button" onclick="submitForms()">Enregistrer les modifications</button>

        </div>
        
    </main>
    <script src="JS/submit.js"></script>
</body>
</html>
