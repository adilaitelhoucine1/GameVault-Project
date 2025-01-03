<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
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
        <!-- Same sidebar as dashboard -->
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
            <a href="#" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
              <span class="text-2xl mr-4">🎮</span> Jeux
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
              <span class="text-2xl mr-4">⚙️</span> Paramètres
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
                <h2 class="text-4xl font-bold text-indigo-700">Gestion des Utilisateurs</h2>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    + Ajouter un utilisateur
                </button>
            </header>

            <!-- Users Table -->
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Nom</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Rôle</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('../Classes/User.php');
                        $user = new User();
                        $users = $user->getAllUsers(); 
                        
                        foreach($users as $user): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-black"><?php echo $user['user_id']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $user['username']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $user['email']; ?></td>
                            <td class="px-6 py-4 text-black"><?php echo $user['Role']; ?></td>
                            <td class="px-6 py-4 text-black">
                            <?php
            echo "<div class='flex gap-2'>
                    <a href='edituser.php?idEdit=".$user['user_id']."' 
                    class='px-4 py-2 text-blue-600 hover:text-white hover:bg-blue-600 rounded-lg transition-colors duration-300 border border-blue-600'>
                    ✏️ Modifier
                    </a>
                    <a href='banuser.php?idBan=".$user['user_id']."' 
                    class='px-4 py-2 text-yellow-600 hover:text-white hover:bg-yellow-600 rounded-lg transition-colors duration-300 border border-yellow-600'>
                    🚫 Bannir
                    </a>
                    <a href='deleteuser.php?idDelete=".$user['user_id']."' 
                    class='px-4 py-2 text-red-600 hover:text-white hover:bg-red-600 rounded-lg transition-colors duration-300 border border-red-600'>
                    🗑️ Supprimer
                    </a>
                </div>";
?>



                            

                              
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>