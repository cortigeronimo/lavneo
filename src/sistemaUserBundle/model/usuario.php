<?php

	class Usuario{

		private $id;
		private $usuario;
		private $password;
		private $email;
        private $inscripcion;
        private $isActive;
		CONST TABLA = "usuarios";

        function __construct(){
            $this->inscripcion = new DateTime();
        }


		public function insertar(){
			$cn = conexion::conectar();
			$query = "INSERT INTO ".self::TABLA." (usuario,password) VALUES ('".$this->usuario."','".$this->password."','".$this->email."') ";
			$resultado = $cn->query($query);
            conexion::cerrar($cn);
			if($resultado){
				return $resultado;
			}
			throw ExceptionCrearUsuario();

		}

		public function eliminar(){

		}

		public function modificar(){

		}

		public function buscarElUsuario(){
			$cn = conexion::conectar();
			$query = "SELECT * FROM ".self::TABLA." WHERE usuario = '". $this->usuario ."' AND password = '". $this->password. "'";
			$resultado = $cn->query($query);
			conexion::cerrar($cn);
			if($resultado){
				$usuario = HerramientasParaMysql::deObjetoSqlAObjeto($resultado);
				return $usuario;
			} else{
				return false;
			}
		}

        public function buscarPor($string, $valor){
            $cn = conexion::conectar();
            $query = "SELECT * FROM ".self::TABLA." WHERE ".$string." = '". $usuario ."'";
            $resultado = $cn->query($query);
            conexion::cerrar($cn);
            if($resultado){
                $usuario = HerramientasParaMysql::deObjetoSqlAObjeto($resultado);
                return $usuario;
            } else{
                return false;
            }
        }
	

        public function getId()
        {
            return $this->id;
        }


        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }


        public function getUsuario()
        {
            return $this->usuario;
        }


        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;

            return $this;
        }


        public function getPassword()
        {
            return $this->password;
        }


        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }


        public function getEmail()
        {
            return $this->email;
        }


        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }


        public function getInscripcion()
        {
            return $this->inscripcion;
        }

        private function setInscripcion($inscripcion)
        {
            $this->inscripcion = $inscripcion;

            return $this;
        }


        public function getIsActive()
        {
            return $this->isActive;
        }

        private function _setIsActive($isActive)
        {
            $this->isActive = $isActive;

            return $this;
        }
}