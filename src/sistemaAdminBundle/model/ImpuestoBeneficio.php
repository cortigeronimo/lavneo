<?php 

	class ImpuestoBeneficio extends MasterBD{

		private $nombre;
		private $porcentaje;
		private $fijo;
                private $productoImpuesto = array();
                //bool
                private $impuestoOBeneficio;
                
                public function getProductoImpuesto() {
                    return $this->productoImpuesto;
                }

                public function getImpuestoOBeneficio() {
                    return $this->impuestoOBeneficio;
                }

                public function setProductoImpuesto($productoImpuesto) {
                    $this->productoImpuesto = $productoImpuesto;
                }

                public function setImpuestoOBeneficio($impuestoOBeneficio) {
                    $this->impuestoOBeneficio = $impuestoOBeneficio;
                }
                
                public function getNombre() {
                    return $this->nombre;
                }

                public function getPorcentaje() {
                    return $this->porcentaje;
                }

                public function getFijo() {
                    return $this->fijo;
                }

                public function getId_producto() {
                    return $this->id_producto;
                }

                public function getImpuesto_beneficio() {
                    return $this->impuesto_beneficio;
                }

                public function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                public function setPorcentaje($porcentaje) {
                    $this->porcentaje = $porcentaje;
                }

                public function setFijo($fijo) {
                    $this->fijo = $fijo;
                }

                public function setId_producto($id_producto) {
                    $this->id_producto = $id_producto;
                }

                public function setImpuesto_beneficio($impuesto_beneficio) {
                    $this->impuesto_beneficio = $impuesto_beneficio;
                }


		
	}