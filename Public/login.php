<?php
require_once('../Config/Connect.php');
require_once('../Classes/User.php');


require_once('../Config/Connect.php');
require_once('../Classes/User.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    
    if($user->connexion($_POST['email'], $_POST['password'])) {
        if($_SESSION['role'] == 'admin') {
            header('Location: dashboard.php');
            exit();
        } else {
            header('Location: UserHome.php');
            exit();
        }
    }
    
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - JeuxVidéo Manager</title>
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
<body class="bg-gray-900 text-white">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-6 fixed top-0 left-0 w-full z-10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-3xl font-bold text-yellow-500">    <span class="block font-[Lobster] animate-bounce text-white">
        LO3AB
    </span></div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="flex justify-center items-center min-h-screen bg-gray-800">
        <div class="bg-gray-700 p-8 rounded-lg shadow-xl w-full max-w-md">
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-6">Connexion</h2>
            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Adresse email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 mt-2 bg-gray-800 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full p-3 mt-2 bg-gray-800 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-md text-lg font-semibold hover:bg-yellow-400 transition-all">Se connecter</button>
            </form>
            <p class="mt-4 text-center text-gray-400">Pas encore de compte ? <a href="register.php" class="text-yellow-500 font-semibold">Inscrivez-vous</a></p>
        </div>
    </section>

</body>
</html>
