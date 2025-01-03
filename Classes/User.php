<?php
require_once('../Config/Connect.php');

class User extends Connect {
    private $user_id;
    private $username;
    private $email;
    private $password;

    public function __construct() {
        $connect = new Connect();
        $this->connection = $connect->getConnection();
    }

    public function connexion($email, $password) {
        $connection = $this->getConnection();
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function AddUser($username, $email, $password) {
        $connection = $this->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'joueur')";
        $stmt = $connection->prepare($sql);
        return $stmt->execute([$username, $email, $hashedPassword]);
    }
}
