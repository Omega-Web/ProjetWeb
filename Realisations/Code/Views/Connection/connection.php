<?php
require_once 'bootstrap.php';

use Code\Infrastructure\Database;
use PDO;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = Database::get();
  
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    try{
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
<form method="post">
    <label for="username">Username</label>
    <input id="username" name="username">
    <br>
    <label for="password">Password</label>
    <input id="password" name="password" type="password">
    <br>
    <button type="submit">Submit</button>
    </form>

    <?php
}
 
?>

