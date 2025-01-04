<?php
require_once('../Classes/Jeu.php');
if (!($_SESSION['role'] === 'admin')) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['idUpdate'])) {
    $jeu_id = $_GET['idUpdate'];
    $jeu = new Jeu();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $nb_joueur = $_POST['nb_joueur'];
        $rating = $_POST['rating'];
        $statut = $_POST['statut'];
        $temps_jeu = $_POST['temps_jeu'];
        $date_sortie = $_POST['date_sortie'];
        
        $jeu->updateJeu($jeu_id, $title, $description, $type, $nb_joueur, $rating, $statut, $temps_jeu, $date_sortie);
        header('location: gamemanagement.php');
    }

    $title = $jeu->getTitle($jeu_id);
    $description = $jeu->getDescription($jeu_id);
    $type = $jeu->getType($jeu_id);
    $nb_joueur = $jeu->getNbJoueur($jeu_id);
    $rating = $jeu->getRating($jeu_id);
    $statut = $jeu->getStatut($jeu_id);
    $temps_jeu = $jeu->getTempsJeu($jeu_id);
    $date_sortie =$jeu->getDateSortie($jeu_id);
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
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-purple-500 via-indigo-600 to-blue-500 text-gray-100 min-h-screen flex">

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

    <main class="flex-1 p-8 bg-white bg-opacity-80 rounded-tl-xl rounded-bl-xl shadow-lg animate-fade-in">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-indigo-700 mb-6 text-center">Modifier un Jeu</h2>

            <form action="" method="POST">
        <!-- Champs avec valeurs insérées -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Titre du Jeu</label>
            <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea id="description" name="description" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" rows="4" required><?php echo $description; ?></textarea>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-medium">Type du Jeu</label>
            <input type="text" id="type" name="type" value="<?php echo $type; ?>" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="nb_joueur" class="block text-gray-700 font-medium">Nombre de Joueurs</label>
            <input type="number" id="nb_joueur" name="nb_joueur" value="<?php echo $nb_joueur; ?>" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="rating" class="block text-gray-700 font-medium">Note</label>
            <input type="number" id="rating" name="rating" value="<?php echo $rating; ?>" step="0.1" max="5" min="0" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="statut" class="block text-gray-700 font-medium">Statut du Jeu</label>
            <select id="statut" name="statut" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                <option value="actif" <?php echo $statut === 'actif' ? 'selected' : ''; ?>>Actif</option>
                <option value="inactif" <?php echo $statut === 'inactif' ? 'selected' : ''; ?>>Inactif</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="temps_jeu" class="block text-gray-700 font-medium">Temps de Jeu (en minutes)</label>
            <input type="number" id="temps_jeu" name="temps_jeu" value="<?php echo $temps_jeu; ?>" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-6">
            <label for="date_sortie" class="block text-gray-700 font-medium">Date de Sortie</label>
            <input type="date" id="date_sortie" name="date_sortie" value="<?php echo $date_sortie; ?>" class="text-black w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">Mettre à jour le Jeu</button>
    </form>
        </div>
    </main>

    <script>
        document.querySelector('.decon_btn').addEventListener('click', function() {
            window.location.href = 'deconnexion.php';
        });
    </script>
</body>

</html>
