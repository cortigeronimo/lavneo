<?php 
	
	class generalController{

		public function index(){
			Vista::crear(GENERAL_BUNDLE."views/index.php");
		}

		public function catalogo(){

			require_once ADMIN_BUNDLE."model/producto.php";
			$producto = new Producto();
			$productos = $producto->buscarTodos();
			Vista::crear(GENERAL_BUNDLE."views/catalogo.php", "productos", $productos);
		}

		public function producto($parametros){
			require_once ADMIN_BUNDLE."model/producto.php";
                        
			$prod = new Producto();
			$producto = $prod->buscarPorCodigo((int)$parametros["codigo"]);
			Vista::crear(GENERAL_BUNDLE."views/producto.php", "producto", $producto);
		}

		public function organizacion(){
			Vista::crear(GENERAL_BUNDLE."views/organizacion.php");
		}

		public function contacto(){

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$nombre = $_POST['nombre'];
				$email = $_POST['email'];
				$mensaje = $_POST['mensaje'];
				$archivo = MAILS."consultaUsuario.php";
				$asunto = "Consulta de " . $nombre; 
				if(email::enviarEmail($email, $asunto, $archivo, $mensaje)){
					Vista::crear("exito/procesadoConExito.php");
				}
				else{
					Vista::crear("error/errorAlEnviarMail.php");
				}
			}

			Vista::crear(GENERAL_BUNDLE."views/contacto.php");
		}

		public function geronimoCorti(){
			Vista::crear(GENERAL_BUNDLE."views/geronimoCorti.php");
		}

		public function registro(){

			if($_SERVER['REQUEST_METHOD'] == "POST"){

				require_once USER_BUNDLE."model/usuario.php";

				$user = $_POST["usuario"];
				$pass = $_POST["password"];

				$usuario = new usuario($user, $pass);
				$usuario->insertar();
				Vista::crear(MENSAJES."exito/procesadoConExito.php");
			}

			Vista::crear(GENERAL_BUNDLE."views/registro.php");
		}


	}