<?php
require_once('../Config/Connect.php');

class Notation extends Connect{
    private $notation_id;
    private $joueur_id;
    private $jeu_id;
    private $rating;
    private $content;
    private $create_at;

    public function afficher_notation() {
    }

    public function ajouter_notation($user_id,$jeu_id,$rating,$content) {
        $connection = $this->getConnection();
        $sql = "INSERT INTO notation (joueur_id,jeu_id,rating,content) VALUES (?, ? ,? ,?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$user_id, $jeu_id, $rating, $content]);
    }
}

?>
