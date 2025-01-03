<?php
require_once('User.php');

class Joueur extends User {
    private $joueur_id;
    private $user_id;

    public function __construct() {
        parent::__construct();
    }

    public function AddJoueur($username, $email, $password, $functionality) {
        $connection = $this->getConnection();
        $connection->beginTransaction();
    
        try {
            $sqlUser = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'joueur')";
            $stmtUser = $connection->prepare($sqlUser);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmtUser->execute([$username, $email, $hashedPassword]);
            $userId = $connection->lastInsertId();
            
            $sqlJoueur = "INSERT INTO joueur (joueur_id) VALUES (?)";
            $stmtJoueur = $connection->prepare($sqlJoueur);
            $stmtJoueur->execute([$userId]);
            
            $connection->commit();
            return true;
            
        } catch (Exception $e) {
            $connection->rollBack();
            throw new Exception("Erreur d'inscription: " . $e->getMessage());
        }
    }
}
