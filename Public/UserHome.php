<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion de Collection de Jeux</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 text-white">

    <!-- Navbar -->
    <nav class="bg-transparent p-6 fixed top-0 left-0 w-full z-10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-3xl font-bold">JeuxVidéo Manager</div>
            <div class="space-x-6">
                <a href="#" class="hover:text-yellow-500 transition-all">Accueil</a>
                <a href="#bibliotheque" class="hover:text-yellow-500 transition-all">Ma Bibliothèque</a>
                <a href="#chat" class="hover:text-yellow-500 transition-all">Chat</a>
                <a href="#profil" class="hover:text-yellow-500 transition-all">Profil</a>
                <a href="#" class="bg-yellow-500 text-gray-800 px-4 py-2 rounded-lg hover:bg-yellow-400 transition-all">Se déconnecter</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center items-center text-center space-y-6">
            <h1 class="text-5xl font-bold leading-tight mb-4">Maîtrisez Votre Collection de Jeux Vidéo</h1>
            <p class="text-xl md:text-2xl font-light mb-8">Suivez vos jeux, partagez vos critiques et connectez-vous avec d'autres joueurs passionnés.</p>
            <a href="#bibliotheque" class="bg-yellow-500 text-gray-800 py-3 px-8 rounded-full text-lg font-semibold hover:bg-yellow-400 transition-all">Explorer Maintenant</a>
        </div>
    </section>

    <!-- Game Library Section -->
    <section id="bibliotheque" class="py-20 bg-gray-800">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-yellow-500 mb-10">Votre Bibliothèque de Jeux</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Game Card -->
                <div class="bg-gray-900 p-6 rounded-lg shadow-xl transform hover:scale-105 transition-all">
                    <img src="https://via.placeholder.com/300x400" alt="Jeu" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-2xl font-semibold mb-2">The Witcher 3</h3>
                    <p class="text-yellow-400 mb-4">Action / RPG</p>
                    <div class="flex justify-between items-center">
                        <span class="text-yellow-500">⭐ 4.8/5</span>
                        <button class="bg-yellow-500 text-gray-800 px-4 py-2 rounded-full hover:bg-yellow-400 transition-all">Détails</button>
                    </div>
                </div>
                <!-- Additional game cards can go here -->
            </div>
        </div>
    </section>

    <!-- Profile & Chat Section -->
    <section id="chat" class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-yellow-500 mb-10">Rejoignez la Communauté</h2>
            <div class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0 md:space-x-8">
                <!-- Profile Card -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full md:w-1/3 transform hover:scale-105 transition-all">
                    <h3 class="text-3xl font-semibold mb-4">Mon Profil</h3>
                    <p class="text-gray-400 mb-6">Consultez et personnalisez votre profil. Gérez vos jeux et suivez vos statistiques.</p>
                    <a href="#" class="bg-yellow-500 text-gray-800 py-3 px-6 rounded-full text-lg font-semibold hover:bg-yellow-400 transition-all">Voir Profil</a>
                </div>
                <!-- Chat Card -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full md:w-1/3 transform hover:scale-105 transition-all">
                    <h3 class="text-3xl font-semibold mb-4">Chat Communautaire</h3>
                    <p class="text-gray-400 mb-6">Partagez vos expériences de jeux et discutez avec d'autres joueurs dans des salons dédiés.</p>
                    <a href="#" class="bg-yellow-500 text-gray-800 py-3 px-6 rounded-full text-lg font-semibold hover:bg-yellow-400 transition-all">Rejoindre le Chat</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 JeuxVidéo Manager. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
