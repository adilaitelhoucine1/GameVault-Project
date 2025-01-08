<?php
require_once('../Config/Connect.php');
class Historique extends Connect{
    private $historique_id;
    private $joueur_id;
    private $jeu_id;
    private $add_at;

    public function GetHistorique($user_id) {
        $connection = $this->getConnection();
        $sql = "SELECT* FROM  jeu j
         JOIN historique h ON h.jeu_id=j.jeu_id
        where h.joueur_id  =? 
        order by add_at desc";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }


    public function AjouterHistorique($jeu_id, $userID) {
        $connection = $this->getConnection();
        $sql = "INSERT INTO historique (joueur_id	, jeu_id) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$userID, $jeu_id]);
    }
}
?>
