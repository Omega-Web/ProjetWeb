<?php   
session_start(); //Récupérer la session actuelle
session_unset(); //Vide les données de la session actuelle
session_destroy(); //Détruit la session actuelle
header("Location: Connection.php"); //Redirige vers "index.php" 
exit();
?>