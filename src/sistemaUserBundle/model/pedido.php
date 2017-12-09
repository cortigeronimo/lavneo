<?php 

	class Pedido extends ConexionConMysql{

		private $fecha;
		private $hora;
		private $estado;
		private $producto_cantidad = array();
		CONST TABLA = "pedidos";

		public function getFecha(){
			return $this->fecha;
		}

		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

		public function getHora(){
			return $this->hora;
		}

		public function setHora($hora){
			$this->hora = $hora;
		}

		public function getEstado(){
			return $this->estado;
		}

		public function setEstado($estado){
			$this->estado = $estado;
		}

		public function getProductoCantidad(){
			return $this->producto_cantidad;
		}

		public function setProductoCantidad($producto_cantidad){
			$this->producto_cantidad[] = $producto_cantidad;
		}

		public function agregarProducto($producto){
			$this->producto_cantidad[] = $producto;
		}
	}