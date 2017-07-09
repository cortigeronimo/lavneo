<?php

	class Ruta{

		private $_controladores = array();
		public function controladores($controlador){
			$this->_controladores = $controlador;
			self::submit();
		}

		public function submit(){
			$uri = isset($_GET["uri"])? "/".$_GET["uri"]:"/";
			$paths = explode("/",$uri);
			$urlnueva = "/".$paths[1];

				$longitud = count($paths);

					$respuesta = $this->buscarEnElArray($urlnueva);
					$parametros = array();

						if($longitud >= 3){
							for($j=2; $j < $longitud; $j++){	
								$parametros[] = $paths[$j];
							}
							
							return $this->getController($respuesta->getBundle(),$respuesta->getControlador(),$respuesta->getMetodo(),$parametros);

						}

						else{
							return $this->getController($respuesta->getBundle(),$respuesta->getControlador(),$respuesta->getMetodo(), NULL);
						}

		}

		public function buscarEnElArray($string){
			foreach ($this->_controladores as $key => $value) {
				if($key == $string){
					return $value;
				}
			}

			throw new Exception404();
			
		}

		public function getController($bundle,$controlador,$metodo, $parametros = null){

				$metodoController = $metodo;
				//llamamos al metodo que incluye al controlador del bundle
				$this->incluirControlador($bundle,$controlador);

				switch($controlador){
					case "adminController":
					case "userController": 
						if(!Sesiones::estaLogeado()){
							return Vista::crear(MENSAJES."error/accesoProhibido.php");
						}
						break;
				}

				$claseTemporal = new $controlador();
						
						if(!empty($parametros)){
							
							$claseTemporal->$metodo($parametros);	
						}

						else{
							
							$claseTemporal->$metodo();	
						}

		}

		public function incluirControlador($bundle,$controlador){
			//si el archivo existe
			$archivo = BUNDLES_RUTA.$bundle."/"."controllers"."/".$controlador.".php";
			include $archivo;

		}
	}