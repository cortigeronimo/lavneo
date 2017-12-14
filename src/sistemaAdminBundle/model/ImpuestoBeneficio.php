<?php 

	class ImpuestoBeneficio extends MasterBD{

		private $nombre;
		private $porcentaje;
		private $fijo;
                //bool
                private $impuestoOBeneficio;
                
                public function tieneFijo(){
                    return $this->fijo != NULL && $this->porcentaje == NULL;
                }
                
                public function tienePorcentaje(){
                    return $this->fijo == NULL && $this->porcentaje != NULL;
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

                public function getImpuestoOBeneficio() {
                    return $this->impuestoOBeneficio;
                }

                public function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                public function setPorcentaje($porcentaje) {
                    $this->porcentaje = $porcentaje;
                    $this->fijo = NULL;
                }

                public function setFijo($fijo) {
                    $this->fijo = $fijo;
                    $this->porcentaje = NULL;
                }

                public function setImpuestoOBeneficio($impuestoOBeneficio) {
                    $this->impuestoOBeneficio = $impuestoOBeneficio;
                }


		
	}