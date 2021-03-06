<?php
session_start();

// Import and use required files
require_once '../../../bootstrap.php';

use Code\Controller\ConnectionController;
// Afficher les erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Instanciation of password error variables
$passwordError = "";
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    try{
        $controller = new ConnectionController();
        $User = $controller->getUser($_POST['username'],$_POST['password']);
        $id_user = $User->getId(); 
        $id_usertype = $User->getId_usertype();
        if ($id_user > 0){
            $_SESSION['id'] = $id_user; 
            $_SESSION['id_usertype'] = $id_usertype;
            header($controller->getPathFromId($id_usertype));
        } else {
            $passwordError = "Le mot de passe ne correspond pas avec l'identifiant";
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>

<!-- Html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidéoMega, Connexion</title>
    <link rel="stylesheet" href="Styles/Connection.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
    <div id="div-logo">
        <a href="Connection.php"><img id="logo" src="../../Assets/logo.png" alt="logo"></a>
    </div>
    <form method="post">
        <input id="username" name="username" placeholder="Nom d'utilisateur">
        <br>
        <label for="password"><?php echo $passwordError ?></label>
        <input id="password" name="password" type="password" placeholder="Mot de passe">
        <br>
        <button type="submit">Se connecter</button>
        </form>
        <p class="connect-subscribe">Vous ne possédez pas encore de compte ? Inscrivez-vous <a href="Subscription.php">ici</a></p>

        <?php
include '../footer.php';