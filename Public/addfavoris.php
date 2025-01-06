<?php
require_once('../Classes/Jeu.php');
if (isset($_GET['idfav'])) {
        $jeu_id = $_GET['idfav'];
        $userID = $_SESSION['user_id'];
        // echo $userID;
        $jeu=new Jeu();
        $jeu->addToFavoris($userID, $jeu_id);
        header("Location: UserHome.php");
   
       }
?>