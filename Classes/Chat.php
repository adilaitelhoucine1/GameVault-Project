<?php
require_once('../Classes/Jeu.php');

class Chat extends Connect{
    private $chat_id;
    private $joueur_id;
    private $content;
    private $create_at;

    public function afficher_chat($jeu_id) {
        $connection = $this->getConnection();
        $sql = "SELECT* FROM  jeu j
        JOIN chat c ON c.jeu_id=j.jeu_id
        JOIN users u ON u.user_id=c.user_id
        where c.jeu_id  =? ";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$jeu_id]);
        return $stmt->fetchAll();
    }

    public function ajouter_chat($jeu_id,$user_id,$message_content) {
        $connection = $this->getConnection();
        $sql = "INSERT INTO chat (jeu_id, user_id,message_content) VALUES (?, ?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$jeu_id, $user_id,$message_content]);
    }
}
?>
