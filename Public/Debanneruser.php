<?php

    require_once('../Classes/User.php');
    require_once('../Classes/Joueur.php');
    if (isset($_GET['idUnban'])) {
        $userID = $_GET['idUnban'];
        //echo $userID;
        $user = new User();
         $user->DebannerUser($userID);
         header("Location: usermanagement.php"); 
       }
?>