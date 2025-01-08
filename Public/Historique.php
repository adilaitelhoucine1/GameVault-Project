<?php

require_once('../Classes/Historique.php');
$user_id= $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Bibliothèque de Jeux</title>
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


    
    <div class="container mx-auto px-4 pt-32">
        
            <?php
    $bibio = new Historique();
    $jeux = $bibio->GetHistorique($user_id);
    //print_r($jeux);
    ?>
        <h1 class="text-4xl font-bold mb-8 text-center">Mon Historique de Jeux</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
    <?php foreach ($jeux as $jeu): ?>
        <div class="bg-gray-800 rounded-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300">
            <p class="font-bold mb-8 text-center">Ajouté le 
                <?php 
                $date = new DateTime($jeu['add_at']); 
                echo $date->format('d/m/Y') . " "; 
                echo "à " . $date->format('H:i'); 
                ?>
            </p>
            <img src="<?php echo $jeu['image_path']; ?>" alt="Game Cover" class="w-full h-48 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-bold"><?php echo $jeu['title']; ?></h3>
                    <span class="bg-pink-500 text-xs px-2 py-1 rounded-full"><?php echo $jeu['type']; ?></span>
                </div>
                <div class="flex justify-between items-center text-sm text-gray-400 mb-4">
                    <span>Temps: <?php echo $jeu['temps_jeu']; ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <a href="details-page.php?id_jeu=<?php echo $jeu['jeu_id']; ?>" class="text-pink-500 hover:text-pink-400 transition-colors">
                        <i class="fas fa-info-circle"></i> Détails
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

    </div>
    <script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>
</body>
</html> 