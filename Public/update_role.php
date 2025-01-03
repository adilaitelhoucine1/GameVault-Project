<?php
  require_once('../Classes/User.php');
  require_once('../Classes/Joueur.php');
  if (isset($_GET['user_id']) && isset($_GET['new_role'])) {
    $user_id = $_GET['user_id'];
    $new_role = $_GET['new_role'];
      //echo $user_id;
     // echo $new_role;
      $user=new User();
      $user->updateUserRole($user_id, $new_role);
      header('Location: usermanagement.php');

}
?>