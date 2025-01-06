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
</head>
<body class="bg-gray-900 font-sans text-gray-100">

    <nav class="bg-black bg-opacity-50 fixed w-full z-20 top-0 left-0 py-6 shadow-lg">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6">
            <div class="text-4xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400">
                JeuxVidéo Manager
            </div>
            <div class="space-x-8 hidden sm:flex">
                <a href="UserHome.php" class="navbar-link text-lg font-semibold">Accueil</a>
                <a href="#" class="navbar-link text-lg font-semibold">Ma Bibliothèque</a>
                <a href="favoris.php" class="navbar-link text-lg font-semibold">Favoris</a>
                <a href="Joueur/profile.php" class="navbar-link text-lg font-semibold">Profil</a>
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
