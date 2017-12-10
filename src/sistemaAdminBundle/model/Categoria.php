<?php 

	class Categoria extends MasterBD{

		private $nombre;
                private $padre;
                private $productos = array();
                
                public function getProductos() {
                    return $this->productos;
                }

                public function setProductos($productos) {
                    $this->productos = $productos;
                }
                
                public function addProducto($producto){
                    $this->productos[] = $producto;
                }
                                
		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
                }
                
                public function getPadre() {
                    return $this->padre;
                }

                public function setPadre($padre) {
                    $this->padre = $padre;
                }

	}