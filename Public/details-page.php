<?php
require_once('../Classes/Jeu.php');
require_once('../Classes/Notation.php');
require_once('../Classes/Chat.php');
if(empty($_SESSION['username'])) {
    header('Location: login.php');
}
//$jeu_details = [];
$jeu_id = $_GET['id_jeu'];
if (isset($_GET['id_jeu'])) {
    $jeu = new Jeu();
    $note = new Notation();
    $AVG=$note->getAvgReviews($jeu_id);
    $jeu_details = $jeu->getGameDetails($jeu_id);
    $jeu_screen = $jeu->getGameScreen($jeu_id);

    $note=new Notation();
    $notation=$note->afficher_notation($jeu_id);

    $Chat= new Chat();
    $Comments=$Chat->afficher_chat($jeu_id);
   // print_r($Comments);
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
                                        <span class="text-yellow-400 text-xl">⭐ <?php echo $AVG; ?>/5</span>
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
                        <?php foreach ($Comments as $comment): ?>
                            <div class="flex content-center	">
                            <i class="fa fa-user text-white mt-2 mr-2"></i>
                                <div class="bg-gray-700 rounded-lg p-3">
                                    <p class="font-bold text-sm"><?php echo $comment['username'] ?></p>
                                    <p class="text-gray-300"><?php echo $comment['message_content'] ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>



                        <form action="addcomment.php" method="GET">
                                <div class="p-4 border-t border-gray-700">
                                    <div class="flex gap-2">
                                        <input type="text" name="content" placeholder="Écrivez votre message..." 
                                            class="flex-1 bg-gray-700 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600">


                                        <input type="text" name="jeuid" value ="<?php echo $jeu_id ?>"
                                            class="hidden">
                                        <button name ="addcomment" class="bg-indigo-600 rounded-full p-2 hover:bg-indigo-700">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <div class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Avis des utilisateurs</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($notation as $note): ?>
        <div class="bg-white p-6 rounded-lg shadow-xl transform hover:scale-105 transition-all duration-300 ease-in-out">
            <div class="flex items-center mb-4">
            <i class="fa fa-user text-black mr-4"></i>


                <div class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($note['username']); ?></div>
               

                <div class="ml-4 text-yellow-400 flex">
                    <?php 
                        $stars = $note['rating']; 
                        for ($i = 0; $i < 5; $i++) {
                            if($i < $stars){
                                echo '⭐';
                            } else{

                                echo '☆'; 
                            }
                        }
                    ?>
                </div>
                <div class="ml-4 text-sm text-gray-500"><?php echo $note['create_at']; ?></div>
            </div>
            <p class="text-gray-700 text-base leading-relaxed"><?php echo $note['content']; ?></p>
        </div>
    <?php endforeach; ?>
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
