<?php
require_once('../Classes/Jeu.php');

$jeu_details = [];
if (isset($_GET['id_jeu'])) {
    $jeu_id = $_GET['id_jeu'];
    $jeu = new Jeu();
    $jeu_details = $jeu->getGameDetails($jeu_id);
    $jeu_screen = $jeu->getGameScreen($jeu_id);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Jeu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 font-sans text-gray-100">
    <div class="relative min-h-screen">
        <div class="container mx-auto px-4 pt-32">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2">
                    <?php foreach ($jeu_details as $jeu): ?>
                        <div class="bg-gray-800 rounded-xl p-6 mb-8">
                            <div class="flex flex-col md:flex-row gap-8">
                                <img src="<?php echo $jeu['image_path']; ?>" alt="<?php echo $jeu['title']; ?>" 
                                     class="w-full md:w-1/3 rounded-lg shadow-xl">

                                <div class="flex-1">
                                    <h1 class="text-4xl font-bold mb-4"><?php echo $jeu['title']; ?></h1>
                                    <div class="flex items-center gap-4 mb-6">
                                        <span class="px-4 py-2 bg-indigo-600 rounded-full"><?php echo $jeu['type']; ?></span>
                                        <span class="text-yellow-400 text-xl">⭐ <?php echo $jeu['rating']; ?>/5</span>
                                        <span class="text-amber-500 text-xl"><?php echo $jeu['date_sortie']; ?></span>
                                    </div>
                                    <p class="text-gray-300 mb-6"><?php echo $jeu['description']; ?></p>
                                    
                                   
                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div class="bg-gray-700 p-4 rounded-lg text-center">
                                            <p class="text-sm text-gray-400">Temps de jeu</p>
                                            <p class="text-xl font-bold"><?php echo $jeu['temps_jeu']; ?></p>
                                        </div>
                                        <div class="bg-gray-700 p-4 rounded-lg text-center">
                                            <p class="text-sm text-gray-400">Joueurs</p>
                                            <p class="text-xl font-bold"><?php echo $jeu['nb_joueur']; ?></p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4">
                                        <button class="px-6 py-3 bg-gradient-to-r from-pink-500 to-yellow-400 rounded-full font-bold">
                                            Ajouter aux favoris
                                        </button>
                                        <button class="px-6 py-3 bg-indigo-600 rounded-full font-bold">
                                            Ajouter à ma bibliothèque
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                    <div class="bg-gray-800 rounded-xl p-6 mb-8">
    <h2 class="text-2xl font-bold mb-6">Screenshots</h2>
    <div class="grid grid-cols-3 gap-4">
        <?php foreach ($jeu_screen as $screen): ?>
            <img src="<?php echo $screen['image_path']; ?>" class="w-full h-48 object-cover rounded-lg cursor-pointer hover:opacity-75 transition">
        <?php endforeach; ?>
    </div>
</div>

                </div>
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 rounded-xl h-[800px] flex flex-col">
                        <div class="p-4 border-b border-gray-700">
                            <h2 class="text-xl font-bold">Discussion du jeu</h2>
                        </div>
                        
                        <div class="flex-1 overflow-y-auto p-4 space-y-4">
                            <div class="flex gap-3">
                                <img src="avatar.jpg" class="w-10 h-10 rounded-full">
                                <div class="bg-gray-700 rounded-lg p-3">
                                    <p class="font-bold text-sm">Username</p>
                                    <p class="text-gray-300">Message content here</p>
                                </div>
                            </div>
                        </div>

                        <!-- Chat Input -->
                        <div class="p-4 border-t border-gray-700">
                            <div class="flex gap-2">
                                <input type="text" placeholder="Écrivez votre message..." 
                                       class="flex-1 bg-gray-700 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                <button class="bg-indigo-600 rounded-full p-2 hover:bg-indigo-700">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
