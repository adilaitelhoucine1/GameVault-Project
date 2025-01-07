<?php
require_once('../Classes/Bibliotheque.php');
if (isset($_GET['idbiblio']) ) {
        $jeu_id = $_GET['idbiblio'];

        //echo $pathimage;
        $Biblio=new Bibliotheque();
        $Biblio->removebiblio($jeu_id);
        header("Location: BibiothequeLsit.php");
       }
?>