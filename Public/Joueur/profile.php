<?php

require_once('../../Classes/User.php');

$user_id = $_SESSION['user_id'];
if(isset($_POST['profile_update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $user = new User();
    $user->UpdateProfile($user_id, $username, $email, $password);
    header("Location: profile.php");    
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Modifier Profil</h2>

   
        <!-- Form to Update Profile -->
        <form action="" method="POST" class="space-y-4">
            <!-- Username Field -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-600">Nom d'utilisateur</label>
                <input type="text" id="username" value="
                <?php
                    $user=new User();
                    echo $user->getUsername($user_id);
                ?>
                " name="username" value="JohnDoe" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Adresse e-mail</label>
                <input type="email" id="email" value="
                <?php
                    $user=new User();
                    echo $user->getEmail($user_id);
                ?>
                " name="email" value="johndoe@example.com" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" name="profile_update" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>

</body>
</html>
