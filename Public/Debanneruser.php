<?php

session_start();
if(!($_SESSION['role'] === 'admin')) {
  header('Location: login.php');
}
    require_once('../Classes/User.php');
    require_once('../Classes/Joueur.php');
    if (isset($_GET['idUnban'])) {
        $userID = $_GET['idUnban'];
        $user = new User();
         $user->DebannerUser($userID);
         header("Location: usermanagement.php"); 
       }
?>