<?php

require_once('../Classes/Jeu.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion de Collection de Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease-in-out;
        }
        .scale-110:hover {
            transform: scale(1.1);
        }
        /* Custom text-shadow for titles */
        .text-shadow {
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        /* Button animation */
        .btn-hover:active {
            transform: scale(0.98);
        }
        /* Video container to cover the screen */
        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        /* Custom navbar styling */
        .navbar-link {
            color: white;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .navbar-link:hover {
            color: #fbbf24;
            transform: scale(1.1);
        }
        /* Enhanced button hover */
        .btn-hover:hover {
            background-color: #fbbf24;
            color: #1f2937;
            transform: scale(1.05);
        }
        /* Better overlay for the video */
        .video-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5); /* Darker overlay for better contrast */
        }
    </style>
</head>
<body class="bg-gray-900 font-sans text-gray-100">

    <!-- Navbar -->
    <nav class="bg-black bg-opacity-50 fixed w-full z-20 top-0 left-0 py-6 shadow-lg">
        <div class="max-w-6xl mx-auto flex justify-between content-center   items-center px-6">
            <div class="text-4xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400">
                JeuxVidéo Manager
            </div>
            <div class="space-x-8 hidden sm:flex ">
                <a href="#" class="navbar-link text-lg font-semibold">Accueil</a>
                <a href="#bibliotheque" class="navbar-link text-lg font-semibold">Ma Bibliothèque</a>
                <a href="#chat" class="navbar-link text-lg font-semibold">Chat</a>
                <a href="FavorisList.php" class="navbar-link text-lg font-semibold">Favoris</a>

                <a href="Joueur/profile.php" class="navbar-link text-lg font-semibold">Profil</a>
                <a href="index.php" class="bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 px-6 py-3 rounded-full text-lg font-semibold btn-hover">
                    Se déconnecter
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Video Background -->
    <section class="relative h-screen flex items-center justify-center text-center px-6 sm:px-12">
        <video autoplay loop muted class="video-container">
            <source src="../assets/video_bgg.mp4" type="video/mp4">
            Votre navigateur ne prend pas en charge la balise vidéo.
        </video>
        <div class="video-overlay"></div> <!-- Darker overlay for better contrast -->
        <div class="relative z-10 px-6 sm:px-12">
            <h1 class="text-6xl md:text-7xl font-extrabold leading-tight mb-6 text-white text-shadow">Maîtrisez Votre Collection de Jeux Vidéo</h1>
            <p class="text-lg md:text-2xl mb-8 font-light text-white text-opacity-90">Suivez vos jeux, partagez vos critiques et connectez-vous avec d'autres joueurs passionnés.</p>
            <a href="#bibliotheque" class="bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 py-4 px-10 rounded-full text-xl font-semibold btn-hover">
                Explorer Maintenant
            </a>
        </div>
    </section>

    <section id="bibliotheque" class="py-28 bg-gray-800">
    <?php
    $jeu = new Jeu();
    $jeux = $jeu->getgamewithscreen();
    ?>
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-5xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400 mb-14">
            Créez votre première bibliothèque de jeux
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
            <?php foreach ($jeux as $jeu): ?>
                <div class="bg-gray-900 shadow-2xl rounded-lg overflow-hidden transform hover:scale-105 hover:shadow-xl transition-all duration-300 relative">
                   
                    
                    <a  href="addfavoris.php?idfav=<?php echo $jeu['jeu_id']; ?>" class="absolute top-0 left-0 bg-gradient-to-r from-pink-500 to-yellow-400 text-white p-2 rounded-b-lg	 hover:opacity-80 transition-all">
                        <i class="far fa-heart"></i>
                    </a>
                    <button class="absolute bottom-0 right-1 bg-gradient-to-r from-green-500 to-blue-400 text-white p-2 rounded-full hover:opacity-80 transition-all">
                        <i class="fas fa-plus"></i> 
                    </button>


                    
             
                    <img src="<?php echo $jeu['image_path']; ?>" alt="<?php echo $jeu['title']; ?>" class="w-full h-60 object-cover">

                    <div class="p-6">
                        <h3 class="text-3xl font-semibold text-white mb-2"><?php echo $jeu['title']; ?></h3>
                        <p class="text-yellow-400 text-lg mb-4 uppercase tracking-wide"><?php echo $jeu['type']; ?></p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-yellow-400 text-xl">⭐ <?php echo $jeu['rating']; ?>/5</span>
                        </div>
                        <div class="flex justify-between items-center space-x-4">
                        <a href="details-page.php?id_jeu=<?php echo $jeu['jeu_id']; ?>" ">
                            <button class="bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 px-6 py-2 rounded-full hover:opacity-90 hover:shadow-lg transition-all duration-300">
                                Détails
                            </button>
                        </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>






    <!-- Profile & Chat Section -->
    <section id="chat" class="py-28 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-5xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400 mb-16">Rejoignez la Communauté</h2>
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-12 sm:space-y-0 sm:space-x-8">
                <!-- Profile Card -->
                <div class="bg-white p-10 rounded-xl shadow-2xl w-full sm:w-1/3 transform hover:scale-105 transition-all">
                    <h3 class="text-4xl font-semibold text-gray-800 mb-6">Mon Profil</h3>
                    <p class="text-gray-600 mb-8">Consultez et personnalisez votre profil. Gérez vos jeux et suivez vos statistiques.</p>
                    <a href="Joueur/profile.php" class="bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 py-4 px-8 rounded-full text-xl font-semibold btn-hover">
                        Voir Profil
                    </a>
                </div>
                <!-- Chat Card -->
                <div class="bg-white p-10 rounded-xl shadow-2xl w-full sm:w-1/3 transform hover:scale-105 transition-all">
                    <h3 class="text-4xl font-semibold text-gray-800 mb-6">Chat Communautaire</h3>
                    <p class="text-gray-600 mb-8">Partagez vos expériences de jeux et discutez avec d'autres joueurs dans des salons dédiés.</p>
                    <a href="#" class="bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 py-4 px-8 rounded-full text-xl font-semibold btn-hover">
                        Rejoindre le Chat
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto text-center text-gray-600">
            <p class="text-lg font-semibold text-white">&copy; 2025 JeuxVidéo Manager. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
