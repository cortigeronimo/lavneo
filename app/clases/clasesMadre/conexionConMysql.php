<?php 

	class ConexionConMysql{

		private $id;
		private $Tabla;

		public function obtenerTodos(){
			$cn = conexion::conectar();
			$rows = array();
			$query = "SELECT * FROM ".self::TABLA." ORDER BY nombre ASC";
			$resultado = $cn->query($query);
			$rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
			conexion::cerrar($cn);
			return $rows;
		}

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