<?php
session_start();
require_once('../Classes/User.php');
require_once('../Classes/Joueur.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $joueur = new Joueur();
        $result = $joueur->AddJoueur(
            $_POST['username'],
            $_POST['email'],
            $_POST['password'],
            'basic_functionality'
        );
        
        if($result) {
            header('Location: login.php?success=1');
            exit();
        }
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!-- Keep existing HTML form -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - JeuxVidéo Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-6 fixed top-0 left-0 w-full z-10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-3xl font-bold text-yellow-500">JeuxVidéo Manager</div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="flex justify-center items-center min-h-screen bg-gray-800">
        <div class="bg-gray-700 p-8 rounded-lg shadow-xl w-full max-w-md">
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-6">Inscription</h2>
            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-300">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" class="w-full p-3 mt-2 bg-gray-800 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Adresse email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 mt-2 bg-gray-800 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full p-3 mt-2 bg-gray-800 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-300">Confirmer le mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="w-full p-3 mt-2 bg-gray-800 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-md text-lg font-semibold hover:bg-yellow-400 transition-all">S'inscrire</button>
            </form>
            <p class="mt-4 text-center text-gray-400">Vous avez déjà un compte ? <a href="login.php" class="text-yellow-500 font-semibold">Connectez-vous</a></p>
        </div>
    </section>

</body>
</html>
