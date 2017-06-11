<?php 

	class ConexionConMysql{

		private $id;

		public function obtenerTodos(){}

		public function obtenerPorId($id){}

		public function obtenerPorCampoYValor($campo, $valor){}

		public function getId()
	    {
	        return $this->id;
	    }

	    private function setId($id)
	    {
	        $this->id = $id;
	    }
	}