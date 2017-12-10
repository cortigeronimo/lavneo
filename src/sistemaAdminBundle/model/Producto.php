<?php

	class Producto extends masterBD{

		//private $codigo;
		private $nombre;
		private $descripcion;
		private $precioUnitario;
		private $imagen;
		private $categoria;
		private $productoImpuesto = array();

		public function eliminar(){

		}

		public function modificar(){

		}

		public function buscarPorCodigo($codigo){
			$cn = conexion::conectar();
			$query = "SELECT * FROM ".self::TABLA." WHERE codigo = ".$codigo;
			$resultado = $cn->query($query);
			$rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
			conexion::cerrar($cn);
			return $rows;
		}

		public function buscarPorNombre($nombre){
			$cn = conexion::conectar();
			$query = "SELECT * FROM ".self::TABLA." WHERE nombre = ".$nombre;
			$resultado = $cn->query($query);
			$rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
			conexion::cerrar($cn);
			return $rows;
		}

	    public function getCodigo()
	    {
	        return $this->codigo;
	    }

	    public function setCodigo($codigo)
	    {
	        $this->codigo = $codigo;
	    }

	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;
	    }

	    public function getDescripcion()
	    {
	        return $this->descripcion;
	    }

	    public function setDescripcion($descripcion)
	    {
	        $this->descripcion = $descripcion;
	    }

	    public function getPrecio()
	    {
	        return $this->precioUnitario;
	    }

	    public function setPrecio($precio)
	    {
	        $this->precioUnitario = $precio;
	    }

	    public function getImagen()
	    {
	        return $this->imagen;
	    }

	    public function setImagen($imagen)
	    {
	        $this->imagen = $imagen;
	    }

	    public function getCategoria()
	    {
	        return $this->categoria;
	    }

	    public function setCategoria($categoria)
	    {
	        $this->categoria = $categoria;
	    }

	    public function getDescuentos()
	    {
	        return $this->descuentos;
	    }

	    public function setDescuentos($descuentos)
	    {
	        $this->descuentos = $descuentos;
	    }

	    public function agregarDescuento($descuento){
	    	$this->descuentos[] = $descuento;
	    }

	    public function getImpuestos()
	    {
	        return $this->impuestos;
	    }

	    public function setImpuestos($impuestos)
	    {
	        $this->impuestos[] = $impuestos;
	    }

	    public function agregarImpuesto($impuesto){
	    	$this->impuestos[] = $impuesto;
	    }
            
            public function getPrecioUnitario() {
                return $this->precioUnitario;
            }

            public function getProductoImpuesto() {
                return $this->productoImpuesto;
            }

            public function setPrecioUnitario($precioUnitario) {
                $this->precioUnitario = $precioUnitario;
            }

            public function setProductoImpuesto($productoImpuesto) {
                $this->productoImpuesto = $productoImpuesto;
            }
            
            public function addProductoBeneficio($productoBeneficio){
                $this->productoBeneficio[] = $productoBeneficio;
            }


}