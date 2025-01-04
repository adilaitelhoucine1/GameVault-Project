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

    
    public function getTitle($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT title FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['title'];
    }

    public function getDescription($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT description FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['description'];
    }

    public function getType($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT type FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['type'];
    }

    public function getNbJoueur($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT nb_joueur FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['nb_joueur'];
    }

    public function getRating($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT rating FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['rating'];
    }

    public function getStatut($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT statut FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['statut'];
    }

    public function getTempsJeu($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT temps_jeu FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['temps_jeu'];
    }

    public function getDateSortie($id_jeu) {
        $connection = $this->getConnection();
        $sql = "SELECT date_sortie FROM jeu WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id_jeu]);
        $result = $stmt->fetch();
        return $result['date_sortie'];
    }


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
    public function updateJeu($jeu_id, $title, $description, $type, $nb_joueur, $rating, $statut, $temps_jeu, $date_sortie) {
        $connection = $this->getConnection();
        $sql = "UPDATE jeu SET title = ?, description = ?, type = ?, nb_joueur = ?, rating = ?, statut = ?, temps_jeu = ?, date_sortie = ? WHERE jeu_id = ?";
        $stmt = $connection->prepare($sql);
        return $stmt->execute([$title, $description, $type, $nb_joueur, $rating, $statut, $temps_jeu, $date_sortie, $jeu_id]);
    }
}
//  $jeu=new Jeu();
//  echo $jeu->getTitle(1);
// $jeu->ajouter_jeu("tet","test","test",20,1,"test",21,2021-10-10);

?>
