<?php
require_once('../Config/Connect.php');

class Notation extends Connect{
    private $notation_id;
    private $joueur_id;
    private $jeu_id;
    private $rating;
    private $content;
    private $create_at;

    public function afficher_notation($jeu_id) {
        $connection = $this->getConnection();
        $sql = "SELECT * FROM notation n JOIN users u on u.user_id=n.joueur_id where jeu_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$jeu_id]);
        return $stmt->fetchAll();
    }

    public function ajouter_notation($user_id, $jeu_id, $rating, $content) {
            $connection = $this->getConnection();
            $insertSql = "INSERT INTO notation (joueur_id, jeu_id, rating, content) VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($insertSql);
            $stmt->execute([$user_id, $jeu_id, $rating, $content]);
        
    }
    

    public function getAvgReviews($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT  ROUND(AVG(rating), 1) as 'Avg' FROM notation WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['Avg'];
    }
}


?>
