<?php
    class conexion {
        
        private $host = "127.0.0.1:3307";
        private $database = "lavneo";
        private $user = "root";
        private $password = "";

        public function conectar() {

            $cn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($cn->connect_errno) {
                throw new ExceptionConexion();
            }
            return $cn;
        }

        public function cerrar($cn) {
            $cn->close();
            return;
        }
        
        public function getHost() {
            return $this->host;
        }

        public function getDatabase() {
            return $this->database;
        }

        public function getUser() {
            return $this->user;
        }

        public function getPassword() {
            return $this->password;
        }



    }
