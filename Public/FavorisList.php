<?php
require_once('../Classes/Jeu.php');
$jeu = new Jeu();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Jeux Favoris</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
         .animate-bounce {
    animation: bounce 1.5s infinite;
}
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}
    </style>
</head>
<body class="bg-gray-900 font-sans text-gray-100">


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
             
                <a href="UserHome.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
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
                <a href="Historique.php" class="group relative text-lg font-semibold text-white transition-all duration-300 hover:text-yellow-400">
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

    <!-- Favorites Section -->
    <section class="pt-32 pb-20 bg-gray-800">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400 mb-12 text-center">Mes Jeux Favoris</h1>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <?php
                $userID = $_SESSION['user_id'];
                $favoris = $jeu->getFavorisGames($userID);
                foreach ($favoris as $game): ?>
                    <div class="bg-gray-900 rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-300">
                        <img src="<?php echo $game['image_path']; ?>" alt="<?php echo $game['title']; ?>" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-white mb-2"><?php echo $game['title']; ?></h3>
                            <p class="text-yellow-400 mb-4"><?php echo $game['type']; ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-yellow-400">⭐ <?php echo $game['rating']; ?>/5</span>
                                <a href="removeFavoris.php?idfav=<?php echo $game['jeu_id']; ?>" 
                                   class="text-red-500 hover:text-red-400 transition-colors">
                                    <i class="fas fa-heart-broken text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (empty($favoris)): ?>
                <div class="text-center py-20">
                    <i class="fas fa-heart-broken text-6xl text-pink-500 mb-6"></i>
                    <p class="text-2xl text-gray-400">Vous n'avez pas encore de jeux favoris</p>
                    <a href="UserHome.php" class="inline-block mt-6 bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 px-8 py-3 rounded-full font-semibold hover:opacity-90 transition-all">
                        Découvrir des jeux
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
