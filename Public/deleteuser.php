<?php

session_start();
if(!($_SESSION['role'] === 'admin')) {
  header('Location: login.php');
}

    require_once('../Classes/User.php');
    require_once('../Classes/Joueur.php');
    if (isset($_GET['idDelete'])) {
        $userID = $_GET['idDelete'];
        $user = new User();
        $user->deleteUser($userID);
        header("Location: usermanagement.php"); 
       }
?>