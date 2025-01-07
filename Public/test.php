<?php
$rate=$_POST['rating'];
echo $rate;

?>   for ($i = 0; $i < 5; $i++) {
    if($i < $stars){
        echo '⭐';
    } else{

        echo '☆'; 
    }
}