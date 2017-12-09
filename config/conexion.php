<?php
    class conexion {
        
        private $host = "localhost";
        private $database = "neomix";
        private $user = "root";
        private $password = "";

        public static function conectar() {

            $cn = new mysqli($this->database, $this->user, $this->password, $this->database);
            if ($cn->connect_errno) {
                throw new ExceptionConexion();
            }
            return $cn;
        }

        public static function cerrar($cn) {
            $cn->close();
            return;
        }

    }
