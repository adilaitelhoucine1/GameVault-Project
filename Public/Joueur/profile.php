<?php

require_once('../../Classes/User.php');

$user_id = $_SESSION['user_id'];
if(isset($_POST['profile_update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordver = $_POST['passwordver'];
   
    if($password === $passwordver) {
        $user = new User();
        $user->UpdateProfile($user_id, $username, $email, $password);
        $message = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">Profile updated successfully!</div>';
    } else {
        $message = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">Passwords do not match!</div>';
    }  
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Modifier Profil</h2>
        <?php 
        if(empty($message)) {
            echo "";
        } else {
        echo $message;
        }
         ?>


   
        <form action="" method="POST" class="space-y-4">
           
            <div>
                <label for="username" class="block text-sm font-medium text-gray-600">Nom d'utilisateur</label>
                <input type="text" id="username" value="
                <?php
                    $user=new User();
                    echo $user->getUsername($user_id);
                ?>
                " name="username" value="JohnDoe" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Adresse e-mail</label>
                <input type="email" id="email" value="
                <?php
                    $user=new User();
                    echo $user->getEmail($user_id);
                ?>
                " name="email" value="johndoe@example.com" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Verifier votre Mot de passe</label>
                <input type="password" id="password" name="passwordver" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            
            <div class="flex justify-between items-center space-x-4 p-4 bg-gray-100 rounded-lg shadow-md">
    <button type="submit" name="profile_update" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Enregistrer les modifications
    </button>
    <a href="../UserHome.php" class="flex items-center text-indigo-600 hover:text-indigo-700 px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
        <span class="text-2xl mr-2">🏠</span>
        <span class="text-xl">Accueil</span>
    </a>
</div>

        </form>
    </div>

</body>
</html>
