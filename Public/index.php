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
    <nav class="bg-gray-800 p-6 fixed top-0 left-0 w-full z-10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-3xl font-bold text-yellow-500">JeuxVidéo Manager</div>
            <div>
            <div>
    <button class="loginBtn bg-yellow-500 text-gray-900 py-2 px-6 rounded-full text-lg font-semibold hover:bg-yellow-400 transition-all">Se connecter</button>
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
