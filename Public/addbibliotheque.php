<?php
require_once('../Classes/Jeu.php');
if (isset($_GET['idbiblio']) && isset($_GET['pathimage'])) {
        $jeu_id = $_GET['idbiblio'];
        $pathimage = $_GET['pathimage'];
        $userID = $_SESSION['user_id'];
        //echo $pathimage;
        $jeu=new Jeu();
        $jeu->AjouterToBiblio($jeu_id,$userID,$pathimage);
        header("Location: BibiothequeLsit.php");
       }
?>