<?php

session_start();
if(!($_SESSION['role'] === 'admin')) {
  header('Location: login.php');
}

    require_once('../Classes/User.php');
    require_once('../Classes/Joueur.php');
    require_once('../Classes/Jeu.php');
    
    if (isset($_GET['idDelete'])) {
        $gameID = $_GET['idDelete'];
        $jeu = new Jeu();
        $jeu->supprimer_jeu($gameID);
        header("Location: gamemanagement.php"); 
       }
?>