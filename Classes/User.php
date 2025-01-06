<?php
require_once(__DIR__ . '/../Config/Connect.php');

class User extends Connect {
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $connection;

    public function __construct() {
        $this->connection = $this->getConnection();
    }

    public function getUserName($id_user) {
        $connection = $this->getConnection();
        $sql = "SELECT username FROM users WHERE user_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_user]);
        $result = $stmt->fetch();
        return $result['username'];
    }
    public function getEmail($id_user) {
        $connection = $this->getConnection();
        $sql = "SELECT email FROM users WHERE user_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_user]);
        $result = $stmt->fetch();
        return $result['email'];
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

    public function updateUserRole($user_id, $new_role){
        $connection = $this->getConnection();
        $sqlUpdate = "UPDATE users SET Role = ? WHERE user_id = ?";
        $stmtUpdate = $connection->prepare($sqlUpdate);
        $stmtUpdate->execute([$new_role, $user_id]);
    }
    public function getTotalUsers() {
        $connection = $this->getConnection();
        $sql = "SELECT COUNT(*) AS total FROM Users";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
    public function UpdateProfile($user_id, $username, $email, $password) {
        $connection = $this->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE users SET username = ?, email = ?, password = ? WHERE user_id = ?";
        $stmtUpdate = $connection->prepare($sqlUpdate);
        $stmtUpdate->execute([$username, $email, $hashedPassword, $user_id]);
    }
}
//  $user = new User();
//  echo $user->getTotalUsers();
?>