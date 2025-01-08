<?php
require_once('../Classes/Jeu.php');
if(isset($_POST['detailsBTN']) && empty($_SESSION['user'])){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion de Collection de Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <!-- Navbar -->

    <nav class="fixed w-full z-50 top-0 left-0 transition-all duration-300 bg-black/50 backdrop-blur-sm">
    <div class="max-w-6xl mx-auto px-4">
       
        <div class="flex justify-between items-center py-4">
            
            <div class="group">
            <h1 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-pink-500 to-yellow-400 hover:scale-110 transform transition-transform duration-300 tracking-wide drop-shadow-lg">
    <span class="block font-[Lobster] animate-bounce text-white">
        LO3AB
    </span>
   
</h1>

                <div class="w-0 group-hover:w-full h-0.5 bg-gradient-to-r from-pink-500 to-yellow-400 transition-all duration-300"></div>
            </div>

            
            <div class="hidden lg:flex items-center space-x-8">
             
                <a href="#" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-home mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Accueil
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>

                
                <a href="BibiothequeLsit.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-book mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            Bibliothèque
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>

                
                <a href="FavorisList.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-heart mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Favoris
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="FavorisList.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
                    <span class="flex items-center">
                        <i class="fas fa-heart mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Historique
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

                <?php if(!empty($_SESSION['user_id'])){

                    echo '<a href="index.php" class="group relative overflow-hidden bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-400 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-pink-500/25">';
                    echo '    <span class="flex items-center relative z-10">';
                       echo     ' <i class="fas fa-sign-out-alt mr-2 transition-transform duration-300 group-hover:rotate-12"></i>';
                        echo'    Se déconnecter';
                     echo    '</span>';
                    echo '    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>';
                    echo '</a>';
                }else{
                    echo '<a href="login.php" class="group relative overflow-hidden bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-400 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-pink-500/25">';
                    echo '    <span class="flex items-center relative z-10">';
                       echo     ' <i class="fas fa-sign-out-alt mr-2 transition-transform duration-300 group-hover:rotate-12"></i>';
                        echo'    Se Connecter';
                     echo    '</span>';
                    echo '    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-purple-500 to-pink-500 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>';
                    echo '</a>';
                }
                
                ?>
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

    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center items-center text-center space-y-6">
            <h1 class="text-5xl font-bold text-yellow-500 leading-tight mb-4">Gérez Votre Collection de Jeux Vidéo</h1>
            <p class="text-xl md:text-2xl font-light mb-8">Suivez vos jeux, partagez vos critiques et connectez-vous avec d'autres joueurs passionnés.</p>
            <button class="bg-yellow-500 text-gray-800 py-3 px-8 rounded-full text-lg font-semibold hover:bg-yellow-400 transition-all">Commencez Maintenant</button>
        </div>
    </section>

    <!-- Game Library Section -->
    <section class="py-20 bg-gray-800">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-yellow-500 mb-10">Découvrez les Jeux</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Game Card -->
                 <?php

require_once('../Classes/Jeu.php');


$jeu = new Jeu();
$jeux = $jeu->getgamewithscreen();
foreach ($jeux as $jeu) {
    echo "
    <div class='bg-gray-700 p-6 rounded-lg shadow-xl transform hover:scale-105 transition-all'>
        <img src='{$jeu['image_path']}' alt='Jeu' class='w-full h-48 object-cover rounded-md mb-4'>
        <h3 class='text-2xl font-semibold mb-2'>{$jeu['title']}</h3>
        <p class='text-yellow-400 mb-4'>{$jeu['type']}</p>
        <div class='flex justify-between items-center'>
            <span class='text-yellow-500'>⭐ {$jeu['rating']}/5</span>
            <form action='' method='post'>
                <input type='hidden' name='game_id' value='{$jeu['jeu_id']}'>
                <button name='detailsBTN' class='bg-yellow-500 text-gray-800 px-4 py-2 rounded-full hover:bg-yellow-400 transition-all'>Détails</button>
            </form>
        </div>
    </div>
    ";
}
?>

          


    

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 JeuxVidéo Manager. Tous droits réservés.</p>
        </div>
    </footer>
    <script>
    document.querySelector('.loginBtn').addEventListener('click', function() {
        window.location.href = 'login.php';
    });
</script>
</body>
</html>
