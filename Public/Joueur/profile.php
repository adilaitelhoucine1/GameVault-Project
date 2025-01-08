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
<nav class="fixed w-full z-50 top-0 left-0 transition-all duration-300 bg-black/50 backdrop-blur-sm">
    <div class="max-w-6xl mx-auto px-4">
       
        <div class="flex justify-between items-center py-4">
            
            <div class="group">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-400 hover:scale-105 transform transition-all duration-300">
                    JeuxVidéo Manager
                </h1>
                <div class="w-0 group-hover:w-full h-0.5 bg-gradient-to-r from-pink-500 to-yellow-400 transition-all duration-300"></div>
            </div>

            
            <div class="hidden lg:flex items-center space-x-8">
             
                <a href="../UserHome.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-home mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Accueil
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>

                
                <a href="../BibiothequeLsit.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-book mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Ma Bibliothèque
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>

                
                <a href="../FavorisList.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-heart mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Favoris
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>

                
                <a href="Joueur/profile.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-user mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Profil
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>

               
                <a href="index.php" class="group relative overflow-hidden bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-400 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-pink-500/25">
                    <span class="flex items-center relative z-10">
                        <i class="fas fa-sign-out-alt mr-2 transition-transform duration-300 group-hover:rotate-12"></i>
                        Se déconnecter
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                </a>
            </div>

            
            <button onclick="toggleMobileMenu()" class="lg:hidden text-white hover:text-yellow-400 transition-colors duration-300">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile  -->
        <div id="mobile-menu" class="hidden lg:hidden">
            <div class="pb-4 space-y-4">
                <a href="#" class="block text-white hover:text-yellow-400 text-lg font-semibold transition-colors duration-300">
                    <i class="fas fa-home mr-2"></i> Accueil
                </a>
                <a href="#bibliotheque" class="block text-white hover:text-yellow-400 text-lg font-semibold transition-colors duration-300">
                    <i class="fas fa-book mr-2"></i> Ma Bibliothèque
                </a>
                <a href="FavorisList.php" class="block text-white hover:text-yellow-400 text-lg font-semibold transition-colors duration-300">
                    <i class="fas fa-heart mr-2"></i> Favoris
                </a>
                <a href="Joueur/profile.php" class="block text-white hover:text-yellow-400 text-lg font-semibold transition-colors duration-300">
                    <i class="fas fa-user mr-2"></i> Profil
                </a>
                <a href="index.php" class="inline-block bg-gradient-to-r from-pink-500 to-yellow-400 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                </a>
            </div>
        </div>
    </div>
</nav>
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
