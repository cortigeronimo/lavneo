<?php

	class Usuario{

		private $id;
		private $usuario;
		private $password;
		private $email;
		private $cuit;
		CONST TABLA = "usuarios";


		public function insertar(){
			$cn = conexion::conectar();
			$query = "INSERT INTO ".self::TABLA." (usuario,password,cuit) VALUES ('".$this->usuario."','".$this->password."','".$this->email."','".$this->cuit."') ";
			$resultado = $cn->query($query);
			if($resultado){
				return $resultado;
			}
			conexion::cerrar($cn);
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


    public function getCuit()
    {
        return $this->cuit;
    }


    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }
}