<?php
session_start();
require_once('../Config/Connect.php');

class User extends Connect {
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $connection;

    public function __construct() {
        $this->connection = $this->getConnection();
    }

    public function connexion($email, $password) {
        try {
            if (isset($_SESSION['user_id'])) {
                return true;
            }

            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['Role']; 
                return true;
            }
            return false;
        } catch (Exception $e) {
            error_log("Erreur de connexion: " . $e->getMessage());
            return false;
        }
    }

    public function AddUser($username, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password, Role) VALUES (?, ?, ?, 'admin')";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([$username, $email, $hashedPassword]);
        } catch (Exception $e) {
            error_log("Erreur d'ajout d'utilisateur: " . $e->getMessage());
            return false;
        }
    }


    public function getAllUsers() {
        $connection = $this->getConnection();
        $sql = "SELECT * FROM users WHERE User_Status = 'NotBanned' ";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function banUser($user_id) {
        $connection = $this->getConnection();
        
            $connection->beginTransaction();
          
            $sqlInsert = "INSERT INTO bannes (banne_id, joueur_id) VALUES (?, ?)";
            $stmtInsert = $connection->prepare($sqlInsert);
            $stmtInsert->execute([$user_id, $user_id]);
            
            $sqlUpdate = "UPDATE users SET User_Status = 'banned' WHERE user_id = ?";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->execute([$user_id]);
            
            $connection->commit();
            
            return true;

    }
    
    public function DebannerUser($user_id) {
        $connection = $this->getConnection();
        
            $connection->beginTransaction();
          
            $sqlDELETE = "DELETE FROM  bannes WHERE banne_id = ?";
            $stmtDELETE = $connection->prepare($sqlDELETE);
            $stmtDELETE->execute([$user_id]);
            
            $sqlUpdate = "UPDATE users SET User_Status = 'NotBanned' WHERE user_id = ?";
            $stmtUpdate = $connection->prepare($sqlUpdate);
            $stmtUpdate->execute([$user_id]);
            
            $connection->commit();
            
            return true;

    }
    
    public function DeleteUser($user_id) {
        $connection = $this->getConnection();
        $sql = "DELETE  FROM users WHERE user_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$user_id]);
    
    }
    public function getBannedUsers(){
        $connection = $this->getConnection();
        $sql = "SELECT * FROM users WHERE User_Status = 'Banned' ";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
//  $user = new User();
//  $user->DeleteUser(148);

// if($user->AddUser('abdo', 'abdo@test.com', 'abdo123')) {
//     //print_r($user);
    
//     if($user->connexion("abdo@test.com", "abdo123")) {
//         echo "Connexion réussie\n";
//         echo "Rôle utilisateur: " . $_SESSION['user_id'] . "\n";
//         echo "Rôle utilisateur: " . $_SESSION['role'] . "\n";
//     } else {
//         echo "Échec de la connexion\n";
//     }
// }   
?>