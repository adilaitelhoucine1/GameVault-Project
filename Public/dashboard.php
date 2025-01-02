<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
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
    .card-hover:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-gradient-to-r from-purple-500 via-indigo-600 to-blue-500 text-gray-100 min-h-screen">

  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-indigo-700 to-indigo-800 text-gray-200 flex flex-col shadow-lg animate-fade-in">
      <div class="p-6 text-center border-b border-indigo-600">
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Admin Panel</h1>
        <p class="text-sm text-indigo-200 mt-2">Gestion simplifiée</p>
      </div>
      <nav class="mt-8 flex-1">
        <ul class="space-y-6">
          <li>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
              <span class="text-2xl mr-4">📊</span> Dashboard
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center px-6 py-3 hover:bg-indigo-600 rounded-lg transition text-xl">
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
        <button class="w-full px-4 py-2 bg-red-600 text-white rounded-md shadow-lg hover:bg-red-700 transition">
          🚪 Déconnexion
        </button>
      </footer>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto bg-white bg-opacity-80 rounded-tl-xl rounded-bl-xl shadow-lg">
      <header class="flex justify-between items-center mb-8">
        <div>
          <h2 class="text-4xl font-bold text-indigo-700">Bienvenue, Admin</h2>
          <p class="text-gray-600 mt-2">Votre tableau de bord personnalisé</p>
        </div>
        <div class="flex items-center space-x-6">
          <input type="text" placeholder="Rechercher..." class="px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <button class="p-3 bg-indigo-600 rounded-full text-white shadow-lg hover:shadow-xl transition relative">
            <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></span> 🔔
          </button>
          <img src="https://via.placeholder.com/50" alt="Avatar" class="w-12 h-12 rounded-full border-2 border-indigo-500">
        </div>
      </header>

      <!-- Stat Cards -->
      <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
        <div class="bg-gradient-to-r from-indigo-600 to-blue-400 text-white shadow-xl rounded-lg p-6 transform transition-all card-hover">
          <h3 class="text-lg font-semibold">Utilisateurs</h3>
          <p class="text-4xl font-bold mt-4">1,245</p>
          <p class="text-sm text-indigo-200 mt-2">+12% cette semaine</p>
        </div>
        <div class="bg-gradient-to-r from-green-600 to-teal-400 text-white shadow-xl rounded-lg p-6 transform transition-all card-hover">
          <h3 class="text-lg font-semibold">Jeux Ajoutés</h3>
          <p class="text-4xl font-bold mt-4">356</p>
          <p class="text-sm text-green-200 mt-2">+8% cette semaine</p>
        </div>
        <div class="bg-gradient-to-r from-yellow-500 to-orange-400 text-white shadow-xl rounded-lg p-6 transform transition-all card-hover">
          <h3 class="text-lg font-semibold">Messages</h3>
          <p class="text-4xl font-bold mt-4">785</p>
          <p class="text-sm text-yellow-200 mt-2">+15% cette semaine</p>
        </div>
        <div class="bg-gradient-to-r from-pink-500 to-red-400 text-white shadow-xl rounded-lg p-6 transform transition-all card-hover">
          <h3 class="text-lg font-semibold">Revenus</h3>
          <p class="text-4xl font-bold mt-4">$8,543</p>
          <p class="text-sm text-pink-200 mt-2">+10% cette semaine</p>
        </div>
      </section>

      <!-- Graphique et Table -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Graphique -->
        <div class="bg-white shadow-2xl rounded-lg p-6">
          <h3 class="text-xl font-semibold mb-4">Utilisateurs Actifs</h3>
          <canvas id="userChart" class="w-full h-64"></canvas>
        </div>
        <!-- Tableau -->
        <div class="bg-white shadow-2xl rounded-lg p-6">
          <h3 class="text-xl font-semibold mb-4">Utilisateurs Récents</h3>
          <table class="w-full table-auto text-left">
            <thead class="bg-indigo-100">
              <tr>
                <th class="px-6 py-3 text-sm text-indigo-500">Nom</th>
                <th class="px-6 py-3 text-sm text-indigo-500">Email</th>
                <th class="px-6 py-3 text-sm text-indigo-500">Date d'inscription</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t">
                <td class="px-6 py-3">John Doe</td>
                <td class="px-6 py-3">john.doe@example.com</td>
                <td class="px-6 py-3">01/01/2025</td>
              </tr>
              <tr class="border-t">
                <td class="px-6 py-3">Jane Smith</td>
                <td class="px-6 py-3">jane.smith@example.com</td>
                <td class="px-6 py-3">02/01/2025</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('userChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Utilisateurs Actifs',
          data: [50, 120, 180, 220, 270, 320],
          borderColor: '#4F46E5',
          borderWidth: 2,
          tension: 0.4,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false,
          },
        },
        scales: {
          x: {
            ticks: { color: '#4F46E5' },
            grid: { color: '#E5E7EB' },
          },
          y: {
            ticks: { color: '#4F46E5' },
            grid: { color: '#E5E7EB' },
          },
        },
      }
    });
  </script>
</body>
</html>
