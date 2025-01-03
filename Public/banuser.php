<?php

    require_once('../Classes/User.php');
    require_once('../Classes/Joueur.php');
    if (isset($_GET['idBan'])) {
        $userID = $_GET['idBan'];
        //echo $userID;
        $user = new User();
         $user->banUser($userID);
         header("Location: usermanagement.php"); 
       }
?>