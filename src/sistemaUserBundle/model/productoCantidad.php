<?php

	class ProductoCantidad extends ConexionConMysql{

		private $cantidad;
		private $productos = array();
		CONST TABLA = "pedido_producto";

		public function getCantidad(){
			return $this->cantidad;
		}

		public function setCantidad($cantidad){
			$this->cantidad = $cantidad;
		}

		public function getProductos(){
			return $this->productos;
		}

		public function setProductos($productos){
			$this->productos[] = $productos;
		}

		public function agregarProducto($producto){
			$this->productos[] = $producto;
		}
	}