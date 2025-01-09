<?php
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
        $stmt->execute([$title, $description, $type, $nb_joueur, $rating, $statut, $temps_jeu, $date_sortie]);
       
        return $connection->lastInsertId();  

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

    public function getgamewithscreen() {
        $connection = $this->getConnection();
        $sql = "SELECT DISTINCT j.*, s.image_path 
                FROM jeu j 
                LEFT JOIN screenshots s ON j.jeu_id = s.jeu_id 
                GROUP BY j.jeu_id";
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

    public function getTotalGames() {
        $connection = $this->getConnection();
        $sql = "SELECT COUNT(*) AS total FROM jeu";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }

    public function AjouterScreenShot($jeu_id, $image_path) {
        $connection = $this->getConnection();
        $sql = "INSERT INTO screenshots (jeu_id, image_path) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$jeu_id, $image_path]);
    }
    
    public function addToFavoris($user_id, $jeu_id) {
        $connection = $this->getConnection();
        $checkSql = "SELECT COUNT(*) FROM favoris WHERE user_id = ? AND jeu_id = ?";
        $stmt = $connection->prepare($checkSql);
        $stmt->execute([$user_id, $jeu_id]);
        $exists = $stmt->fetchColumn();
        if(!$exists){
            $sql = "INSERT INTO favoris (user_id, jeu_id) VALUES (?, ?)";
            $stmt = $connection->prepare($sql);
            return $stmt->execute([$user_id, $jeu_id]);
        }
    }
    

    public function removeFavoris($user_id, $jeu_id) {
        $connection = $this->getConnection();
        $sql = "DELETE FROM favoris WHERE user_id = ? AND jeu_id = ?";
        $stmt = $connection->prepare($sql);
        return $stmt->execute([$user_id, $jeu_id]);
    }
    public function getFavorisGames($user_id) {
        $connection = $this->getConnection();
        $sql = "SELECT DISTINCT j.*, s.image_path 
                FROM jeu j 
                JOIN favoris f ON j.jeu_id = f.jeu_id 
                LEFT JOIN screenshots s ON j.jeu_id = s.jeu_id 
                WHERE f.user_id = ? 
                GROUP BY j.jeu_id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
    public function getGameDetails($jeu_id){
        $connection = $this->getConnection();
        $sql = "SELECT * FROM jeu j join screenshots s ON j.jeu_id = s.jeu_id WHERE j.jeu_id = ? LIMIT 1";
        $stmt=$connection->prepare($sql);
        $stmt->execute([$jeu_id]);
        return $stmt->fetchAll();
    }
    public function getGameScreen($jeu_id){
        $connection = $this->getConnection();
        $sql = "SELECT * FROM screenshots  WHERE jeu_id = ? ";
        $stmt=$connection->prepare($sql);
        $stmt->execute([$jeu_id]);
        return $stmt->fetchAll();
    }

    public function AjouterToBiblio($jeu_id, $userID,$image_path) {


        $connection = $this->getConnection();
        $connection->beginTransaction();
        $checkSql = "SELECT COUNT(*) FROM bibliotheque WHERE joueur_id = ? AND jeu_id = ?";
        $stmt = $connection->prepare($checkSql);
        $stmt->execute([$userID, $jeu_id]);
        $exists = $stmt->fetchColumn();
        if(!$exists){

    
            $sql = "INSERT INTO bibliotheque (joueur_id	, jeu_id,image_path) VALUES (?, ?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $jeu_id,$image_path]);
        }

        $checkSql = "SELECT COUNT(*) FROM historique WHERE joueur_id = ? AND jeu_id = ?";
        $stmt = $connection->prepare($checkSql);
        $stmt->execute([$userID, $jeu_id]);
        $existsHisto = $stmt->fetchColumn();
        if(!$existsHisto){

            $sqlHisto = "INSERT INTO historique (joueur_id	, jeu_id,image_path) VALUES (?, ?, ?)";
            $stmtHisto = $connection->prepare($sqlHisto);
            $stmtHisto->execute([$userID, $jeu_id,$image_path]);
        }


        $connection->commit();
    }
}
//     $jeu=new Jeu();
   
// $jeux=$jeu->getgamewithscreen();

// foreach ($jeux as $jeu):
    
        
    
//         echo $jeu['image_path'];
      
    
// endforeach;

// $jeu->ajouter_jeu("tet","test","test",20,1,"test",21,2021-10-10);

?>
