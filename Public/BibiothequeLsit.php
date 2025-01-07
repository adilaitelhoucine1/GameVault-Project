<?php

require_once('../Classes/Bibliotheque.php');
$user_id= $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque de Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Effet de lumière sur les cartes */
        .card:hover {
            box-shadow: 0 10px 25px rgba(255, 165, 0, 0.3), 0 4px 15px rgba(255, 99, 71, 0.3);
        }

        /* Animation sur les boutons */
        .btn-hover:hover {
            transform: scale(1.05) rotate(2deg);
        }

        /* Titre principal avec glow */
        .title-glow {
            text-shadow: 0 4px 6px rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-r from-gray-900 to-gray-800 text-white">

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
                        Ma Bibliothèque
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


    <!-- Section Bibliothèque -->
    <section id="bibliotheque" class="py-28">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400 mb-16 title-glow">
                Explorez Votre Univers de Jeux
            </h2>

           
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
               
                

                
    <?php
    $bibio = new Bibliotheque();
    $jeux = $bibio->GetBiblio($user_id);
    
    ?>
   
   <?php foreach ($jeux as $jeu): ?>
                <div class="bg-gray-900 shadow-lg rounded-xl overflow-hidden transform hover:scale-105 card transition-all duration-300 relative">
                   
                    
                    <a  href="addfavoris.php?idfav=<?php echo $jeu['jeu_id']; ?>" class="absolute top-0 left-0 bg-gradient-to-r from-pink-500 to-yellow-400 text-white p-2 rounded-b-lg	 hover:opacity-80 transition-all">
                        <i class="far fa-heart"></i>
                    </a>
                    <a href=deletebibliotheque.php?idbiblio=<?php echo $jeu['jeu_id']; ?> class="absolute bottom-0 right-1 bg-gradient-to-r from-green-500 to-blue-400 text-white p-2 rounded-full hover:opacity-80 transition-all flex items-center justify-center">
                    <i class="fas fa-minus text-lg"></i>
                    </a>



                    
             
                    <img src="<?php echo $jeu['image_path']; ?>" alt="<?php echo $jeu['title']; ?>" class="w-full h-60 object-cover">

                    <div class="p-6">
                        <h3 class="text-3xl font-semibold text-white mb-2"><?php echo $jeu['title']; ?></h3>
                        <p class="text-yellow-400 text-lg mb-4 uppercase tracking-wide"><?php echo $jeu['type']; ?></p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-yellow-400 text-xl">⭐ <?php echo $jeu['rating']; ?>/5</span>
                        </div>
                        <div class="flex justify-between items-center space-x-4">
                        <a href="details-page.php?id_jeu=<?php echo $jeu['jeu_id']; ?>" ">
                            <button class="inline-block bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 px-6 py-2 rounded-full hover:shadow-xl hover:opacity-90 transition-all duration-300">
                            Voir les Détails
                            </button>
                        </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        
            </div>
        </div>
    </section>

</body>
</html>
