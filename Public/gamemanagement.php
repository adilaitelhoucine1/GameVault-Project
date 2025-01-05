<?php
require_once('../Classes/Jeu.php');

if(!($_SESSION['role'] === 'admin')) {
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.5s ease-out; }
    </style>
</head>
<body class="bg-gradient-to-r from-purple-500 via-indigo-600 to-blue-500 text-gray-100 min-h-screen">
    <div class="flex h-screen">
        <aside class="w-72 bg-gradient-to-b from-indigo-700 to-indigo-800 text-gray-200 flex flex-col shadow-lg animate-fade-in">
            <div class="p-6 text-center border-b border-indigo-600">
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Admin Panel</h1>
                <p class="text-sm text-indigo-200 mt-2">Gestion simplifiée</p>
            </div>
            <nav class="mt-8 flex-1">
                <ul class="space-y-6">
                    <li>
                        <a href="dashboard.php" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
                            <span class="text-2xl mr-4">📊</span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="usermanagement.php" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
                            <span class="text-2xl mr-4">👤</span> Utilisateurs
                        </a>
                    </li>
                    <li>
                        <a href="gamemanagement.php" class="flex items-center px-6 py-3 bg-indigo-600 rounded-lg transition text-xl">
                            <span class="text-2xl mr-4">🎮</span> Jeux
                        </a>
                    </li>
                    <li>
                    <a href="UserHome.php" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
    <span class="text-2xl mr-4">🏠</span> Accueil
          </a>
                    </li>
                </ul>
            </nav>
            <footer class="p-4 mt-auto border-t border-indigo-600 text-center">
                <button class="decon_btn w-full px-4 py-2 bg-red-600 text-white rounded-md shadow-lg hover:bg-red-700 transition">
                    🚪 Déconnexion
                </button>
            </footer>
        </aside>

        <main class="flex-1 p-8 overflow-y-auto bg-white bg-opacity-80 rounded-tl-xl rounded-bl-xl shadow-lg">
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-bold text-indigo-700">Gestion des Jeux</h2>
                <a href="modelAjout.php" class="block px-6 py-3 bg-green-600 text-white text-center rounded-lg hover:bg-green-700 transition">
                         ➕ Ajouter un Jeu
                </a>

            </header>

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <table class="w-full">
    <thead class="bg-indigo-600 text-white">
        <tr>
            <th class="px-6 py-3 text-left">Titre</th>
            <th class="px-6 py-3 text-left">Description</th>
            <th class="px-6 py-3 text-left">Type</th>
            <th class="px-6 py-3 text-left">Nb Joueurs</th>
            <th class="px-6 py-3 text-left">Note</th>
            <th class="px-6 py-3 text-left">Statut</th>
            <th class="px-6 py-3 text-left">Temps de jeu</th>
            <th class="px-6 py-3 text-left">Date de sortie</th>
            <th class="px-6 py-3 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
                      
                        $jeu = new Jeu();
                        $jeux = $jeu->getAllGames(); 
                        
                        foreach($jeux as $jeu): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-black"><?php echo $jeu['title']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['description']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['type']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['nb_joueur']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['rating']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['statut']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['temps_jeu']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $jeu['date_sortie']; ?></td>
                            <td class="px-6 py-4 text-black">
                            <?php
echo "<div class='flex gap-2'>

    <form action='UpdateGame.php' method='POST'>
        <input type='hidden' name='idUpdate' value='".$jeu['jeu_id']."'>
        <button type='submit' class='px-4 py-2 text-yellow-600 hover:text-white hover:bg-yellow-600 rounded-lg transition-colors duration-300 border border-yellow-600'>
            ✏️ Modifier
        </button>
    </form>

    <a href='deletegame.php?idDelete=".$jeu['jeu_id']."' 
       class='px-4 py-2 text-red-600 hover:text-white hover:bg-red-600 rounded-lg transition-colors duration-300 border border-red-600'>
        🗑️ Supprimer
    </a>

</div>";
?>

 </td>
 <td class="px-6 py-4 text-black">

</td>                        
                            </td>
                        </tr>
                        <?php endforeach; ?>
    </tbody>
</table>


            </div>
        </main>
    </div>

    <script>
        document.querySelector('.decon_btn').addEventListener('click', function() {
            window.location.href = 'deconnexion.php';
        });
    </script>
</body>
</html>
