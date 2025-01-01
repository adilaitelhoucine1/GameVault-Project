<?php
    class User {
        protected $user_id;
        protected $username;
        protected $email;
        protected $password;

        public function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = password_hash($password, PASSWORD_BCRYPT);
        }

        public function connexion($email, $password) {
            return true;
        }
    }
?>