<?php
require_once('../Classes/Notation.php');
$user_id= $_SESSION['user_id'];
$rate=$_POST['rating'];
$jeuID=$_POST['jeuID'];
$reviewContent=$_POST['reviewContent'];
// echo $rate;
// echo "<br>";
// echo $jeuID;
// echo "<br>";
// echo $reviewContent;
// echo "<br>";
// echo $user_id;
$notation = new Notation();
$notation->ajouter_notation($user_id,$jeuID,$rate,$reviewContent);
header("Location: details-page.php?id_jeu=" . urlencode($jeuID));

?>