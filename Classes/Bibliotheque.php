<?php
require_once('../Classes/Jeu.php');

class Bibliotheque extends Jeu {
    private $bib_id;
    private $joueur_id;
    private $jeu_id;

    public function GetBiblio($user_id) {
        $connection = $this->getConnection();
        $sql = "SELECT* FROM  jeu j
        JOIN bibliotheque b ON b.jeu_id=j.jeu_id
        where b.joueur_id  =? ";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
    public function removebiblio($jeu_id) {
        $connection = $this->getConnection();
        $sql = "DELETE FROM bibliotheque WHERE  jeu_id  = ?";
        $stmt = $connection->prepare($sql);
        return $stmt->execute([$jeu_id]);
    }
}
?>
