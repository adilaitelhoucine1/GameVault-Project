<?php
require_once('../Classes/Chat.php');
require_once('../Classes/User.php');
if (isset($_GET['addcomment'])) {
      
        $jeu_id = $_GET['jeuid'];
        $content = $_GET['content'];
        $userID = $_SESSION['user_id'];
        //  echo $jeu_id;
        //  echo "<br>";
        //  echo $userID;
        //  echo "<br>";
        //  echo $content;
        $chat=new Chat();
        $user=new User();
       if($user->CheckBanned($userID) == "NotBanned"){
               $chat->ajouter_chat($jeu_id,$userID,$content);
        }
        
        header("Location: details-page.php?id_jeu=" . urlencode($jeu_id));
}

?>