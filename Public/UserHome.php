<?php

require_once('../Classes/Jeu.php');
if(empty($_SESSION['role'])) {
    header('Location: login.php');
  }
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion de Collection de Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@700&display=swap" rel="stylesheet">


    <style>

    @keyframes marquee {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .animate-marquee {
        display: flex;
        animation: marquee 300s linear infinite;
    }

    .animate-marquee .bg-gray-800 {
        margin-right: 2rem;
    }

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

        .transition-all {
            transition: all 0.3s ease-in-out;
        }
        .scale-110:hover {
            transform: scale(1.1);
        }
        .text-shadow {
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .btn-hover:active {
            transform: scale(0.98);
        }
        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .navbar-link {
            color: white;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .navbar-link:hover {
            color: #fbbf24;
            transform: scale(1.1);
        }
        .btn-hover:hover {
            background-color: #fbbf24;
            color: #1f2937;
            transform: scale(1.05);
        }
        .video-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5); 
        }
        @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
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

                    echo '<a href="login.php" class="group relative overflow-hidden bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-400 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-pink-500/25">';
                    echo '    <span class="flex items-center relative z-10">';
                       echo     ' <i class="fas fa-sign-out-alt mr-2 transition-transform duration-300 group-hover:rotate-12"></i>';
                        echo'    Se déconnecter';
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

    
    <section class="relative h-screen flex items-center justify-center text-center px-6 sm:px-12">
        <video autoplay loop muted class="video-container">
            <source src="../assets/video_bgg.mp4" type="video/mp4">
            Votre navigateur ne prend pas en charge la balise vidéo.
        </video>
        <div class="video-overlay"></div> 
        <div class="relative z-10 px-6 sm:px-12">
            <h1 class="text-6xl md:text-7xl font-extrabold leading-tight mb-6  text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-400 ">Maîtrisez Votre Collection de Jeux Vidéo</h1>
            <p class="text-lg md:text-2xl mb-8 font-light text-white text-opacity-90">Suivez vos jeux, partagez vos critiques et connectez-vous avec d'autres joueurs passionnés.</p>
            <a href="#bibliotheque" class="bg-gradient-to-r from-pink-500 to-yellow-400 text-gray-900 py-4 px-10 rounded-full text-xl font-semibold btn-hover">
                Explorer Maintenant
            </a>
        </div>
    </section>

    <section id="bibliotheque" class="py-28  bg-gradient-to-b from-gray-900 to-black">
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
                    <a href="addbibliotheque.php?idbiblio=<?php echo $jeu['jeu_id']; ?>&pathimage=<?php  echo $jeu['image_path']; ?>" class="absolute bottom-0 right-1 bg-gradient-to-r from-green-500 to-blue-400 text-white p-2 rounded-full hover:opacity-80 transition-all flex items-center justify-center">
                        <i class="fas fa-plus"></i>
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






    
<section id="trending-games" class="py-28 bg-gradient-to-b from-gray-900 to-black text-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-red-500 mb-16">
            Jeux Tendance
        </h2>
        
        <!-- Trending Games Animation Container -->
        <div class="relative overflow-hidden">
            <div class="flex space-x-8 animate-marquee">
                <!-- Game Card 1 -->
                <div class="bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                    <img
                        src="https://storage.googleapis.com/pod_public/1300/216712.jpg"
                        alt="Elden Ring"
                        class="rounded-t-lg w-full h-48 object-cover"
                    />
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Elden Ring</h3>
                        <p class="text-gray-400 mb-4">
                            Explorez un monde fantastique avec des combats intenses et une histoire captivante.
                        </p>
                        <a
                            href="#"
                            class="bg-gradient-to-r from-yellow-400 to-red-500 py-2 px-4 rounded-full text-lg font-semibold text-gray-900"
                        >
                            Découvrir
                        </a>
                    </div>
                </div>

                <!-- Game Card 2 -->
                <div class="bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                    <img
                        src="https://image.api.playstation.com/vulcan/ap/rnd/202207/1210/4xJ8XB3bi888QTLZYdl7Oi0s.png"
                        alt="God of War"
                        class="rounded-t-lg w-full h-48 object-cover"
                    />
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">God of War</h3>
                        <p class="text-gray-400 mb-4">
                            Plongez dans un voyage épique avec Kratos et Atreus dans des mondes légendaires.
                        </p>
                        <a
                            href="#"
                            class="bg-gradient-to-r from-yellow-400 to-red-500 py-2 px-4 rounded-full text-lg font-semibold text-gray-900"
                        >
                            Découvrir
                        </a>
                    </div>
                </div>

                <!-- Game Card 3 -->
                <div class="bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                    <img
                        src="https://assets.xboxservices.com/assets/71/b5/71b50f29-5799-4be1-97ef-d58d57c9fe37.jpg?n=CoD-Modern-Warfare-III_GLP-Page-Hero-0_1083x1222_02.jpg"
                        alt="Call of Duty"
                        class="rounded-t-lg w-full h-48 object-cover"
                    />
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Call of Duty</h3>
                        <p class="text-gray-400 mb-4">
                            Découvrez l'action multijoueur ultime et une campagne palpitante.
                        </p>
                        <a
                            href="#"
                            class="bg-gradient-to-r from-yellow-400 to-red-500 py-2 px-4 rounded-full text-lg font-semibold text-gray-900"
                        >
                            Découvrir
                        </a>
                    </div>
                </div>

                <!-- Game Card 4 -->
                <div class="bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                    <img
                        src="https://image.jeuxvideo.com/medias/165165/1651652506-3619-jaquette-avant.jpg"
                        alt="Red Dead Redemption 2"
                        class="rounded-t-lg w-full h-48 object-cover"
                    />
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Red Dead Redemption 2</h3>
                        <p class="text-gray-400 mb-4">
                            Vivez l'aventure dans l'Ouest sauvage avec des graphismes époustouflants et une narration captivante.
                        </p>
                        <a
                            href="#"
                            class="bg-gradient-to-r from-yellow-400 to-red-500 py-2 px-4 rounded-full text-lg font-semibold text-gray-900"
                        >
                            Découvrir
                        </a>
                    </div>
                </div>
                <!-- Game Card 4 -->
                <div class="bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                    <img
                        src="https://d13ms5efar3wc5.cloudfront.net/eyJidWNrZXQiOiJpbWFnZXMtY2Fycnkxc3QtcHJvZHVjdHMiLCJrZXkiOiI2NWY3YzgxZi0yNDQxLTRhZGYtODMyMS1hOTY4ODM3NGU1MzEucG5nLndlYnAiLCJlZGl0cyI6eyJyZXNpemUiOnt9fSwid2VicCI6eyJxdWFsaXR5Ijo3NX19"
                        alt="Red Dead Redemption 2"
                        class="rounded-t-lg w-full h-48 object-cover"
                    />
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Free Fire</h3>
                        <p class="text-gray-400 mb-4">
                            Vivez l'aventure dans l'Ouest sauvage avec des graphismes époustouflants et une narration captivante.
                        </p>
                        <a
                            href="#"
                            class="bg-gradient-to-r from-yellow-400 to-red-500 py-2 px-4 rounded-full text-lg font-semibold text-gray-900"
                        >
                            Découvrir
                        </a>
                    </div>
                </div>

                <!-- Game Card 5 -->
                <div class="bg-gray-800 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9f/Cyberpunk_2077_box_art.jpg/220px-Cyberpunk_2077_box_art.jpg"
                        alt="Cyberpunk 2077"
                        class="rounded-t-lg w-full h-48 object-cover"
                    />
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Cyberpunk 2077</h3>
                        <p class="text-gray-400 mb-4">
                            Immersion dans un futur cybernétique avec une grande liberté de choix et des missions palpitantes.
                        </p>
                        <a
                            href="#"
                            class="bg-gradient-to-r from-yellow-400 to-red-500 py-2 px-4 rounded-full text-lg font-semibold text-gray-900"
                        >
                            Découvrir
                        </a>
                    </div>
                </div>
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
    <script>
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const isHidden = mobileMenu.classList.contains('hidden');
    
    if (isHidden) {
        mobileMenu.classList.remove('hidden');
        mobileMenu.classList.add('animate-fade-in');
    } else {
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('animate-fade-in');
    }
}

// Ajout de l'effet de scroll
window.addEventListener('scroll', function() {
    const nav = document.querySelector('nav');
    if (window.scrollY > 20) {
        nav.classList.add('bg-black/90');
        nav.classList.add('py-2');
    } else {
        nav.classList.remove('bg-black/90');
        nav.classList.remove('py-2');
    }
});
</script>

</body>
</html>
