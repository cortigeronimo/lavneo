<?php

	class Producto extends masterBD{

		private $nombre;
		private $descripcion;
		private $precioUnitario;
		private $imagen;
		private $categoria;
		private $impuestosYBeneficios = array();

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
            
            public function getPrecioUnitario() {
                return $this->precioUnitario;
            }

            public function getImpuestosYBeneficios() {
                return $this->impuestosYBeneficios;
            }

            public function setPrecioUnitario($precioUnitario) {
                $this->precioUnitario = $precioUnitario;
            }

            public function setImpuestosYBeneficios($productoImpuesto) {
                $this->impuestosYBeneficios = $productoImpuesto;
            }
            
            public function addImpuestoOBeneficio($impuestoOBeneficio){
                $this->impuestosYBeneficios[] = $impuestoOBeneficio;
            }


}