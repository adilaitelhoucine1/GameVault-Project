<?php
session_start();
require_once('../Config/Connect.php');

class Jeu extends Connect {
    private $jeu_id;
    private $title;
    private $description;
    private $type;
    private $nb_joueur;
    private $rating;
    private $statut;
    private $temps_jeu;
    private $date_sortie;
    private $create_at;


    public function ajouter_jeu($title, $description, $type, $nb_joueur, $rating, $statut, $temps_jeu, $date_sortie) {
        $connection = $this->getConnection();
        
        $sql = "INSERT INTO jeu (title, description, type, nb_joueur, rating, statut, temps_jeu, date_sortie) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $connection->prepare($sql);
        return $stmt->execute([$title, $description, $type, $nb_joueur, $rating, $statut, $temps_jeu, $date_sortie]);
    }

   

    public function supprimer_jeu($jeu_id) {
        $connection = $this->getConnection();
        $sql = "DELETE  FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$jeu_id]);
    }

    

    public function getAllGames() {
        $connection = $this->getConnection();
        $sql = "SELECT * FROM jeu";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
// $jeu=new Jeu();
// $jeu->ajouter_jeu("tet","test","test",20,1,"test",21,2021-10-10);

?>
