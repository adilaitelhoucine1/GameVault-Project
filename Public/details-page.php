<?php
require_once('../Classes/Jeu.php');

//$jeu_details = [];
$jeu_id = $_GET['id_jeu'];
if (isset($_GET['id_jeu'])) {
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
<nav class="bg-black bg-opacity-50  w-full z-20 top-0 left-0 py-6 shadow-lg">
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
                                        <button class="px-6 py-3 bg-gradient-to-r from-yellow-400 to-pink-500 rounded-full font-bold" id="showRating">
                                        Ajouter Une Note ⭐
                                        </button>
                                        <button class="px-6 py-3 bg-indigo-00 rounded-full font-bold">
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
<!-- modeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeel -->

<div id="rating-modal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
  <div class="bg-white shadow-2xl rounded-lg p-6 max-w-md w-full relative">
    <!-- Close Button -->
    <button id="close-modal" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition duration-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

  
    <h1 class="text-3xl font-bold text-gray-800 text-center mb-4">Donnez votre avis</h1>
    <p class="text-sm text-gray-600 text-center mb-6">Sélectionnez une note entre 1 et 5 étoiles :</p>

   
    <form id="rating-form" method="POST" action="rating.php" class="flex flex-col items-center gap-4">
      
      <div class="flex justify-center space-x-2 mb-6">
        <input type="hidden" id="jeuID" name="jeuID" value="<?php echo $jeu_id; ?>">

        <input type="radio" id="star5" name="rating" value="5" class="hidden peer">
        <label for="star5" class="text-4xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 transition duration-300">★</label>

        <input type="radio" id="star4" name="rating" value="4" class="hidden peer">
        <label for="star4" class="text-4xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 transition duration-300">★</label>

        <input type="radio" id="star3" name="rating" value="3" class="hidden peer">
        <label for="star3" class="text-4xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 transition duration-300">★</label>

        <input type="radio" id="star2" name="rating" value="2" class="hidden peer">
        <label for="star2" class="text-4xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 transition duration-300">★</label>

        <input type="radio" id="star1" name="rating" value="1" class="hidden peer">
        <label for="star1" class="text-4xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 transition duration-300">★</label>
      </div>

      <div class="w-full">
        <label for="reviewContent" class="block text-sm font-medium text-gray-700 mb-2">
          Votre avis :
        </label>
        <input
          type="text"
          id="reviewContent"
          name="reviewContent"
          class="text-black w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"
          placeholder="Écrivez votre avis ici..."
        />
      </div>

      <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-300">
        Soumettre
      </button>
    </form>
  </div>
</div>

  <script>
    const modal = document.getElementById("rating-modal");
    const closeModal = document.getElementById("close-modal");
    const showRating = document.getElementById("showRating");

    closeModal.addEventListener("click", () => {
      modal.classList.add("hidden");
    });
    showRating.addEventListener("click", () => {
      modal.classList.remove("hidden");
    });
  </script>

</body>
</html>
