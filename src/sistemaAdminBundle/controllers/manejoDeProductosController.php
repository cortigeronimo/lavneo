<?php 

	require_once ADMIN_BUNDLE."model/producto.php";

	class ManejoDeProductosController{
		public function subirProductos(){

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$nombre = $_POST["nombre"];
				$descripcion = $_POST["descripcion"];
				$precio = $_POST["precio"];
				//luego hacer una funcion que pregunte si ya existe ese numero
				if((isset($_FILES['archivo'])) && ($_FILES['archivo'] !='')){
                $temName = $_FILES['archivo']['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
                $ruta = ASSETS_RUTA . "imagenes/productos/" . $_FILES['archivo']['name']; //donde guardo el archivo
                $resultado = @move_uploaded_file($temName, $ruta);
                $ruta = $_FILES['archivo']['name'];
                }

                else{
                	$ruta = "";
                }

                $producto = new Producto();

				if($producto->subir($nombre, $descripcion, $precio, $ruta)){
					return Vista::crear(MENSAJES."exito/procesadoConExito.php");
				}

				return Vista::crear(MENSAJES."error/errorEnvioDeDatos.php");
			}

			return Vista::crear(ADMIN_BUNDLE."views/subirProductos.php");
		}

		public function eliminarProductos(){
			return Vista::crear(ADMIN_BUNDLE."views/eliminarProductos.php");
		}

		public function modificarProductos(){
			$producto = new Producto();
			$productos = $producto->buscarTodos();
			return Vista::crear(ADMIN_BUNDLE."views/modificarProductos.php", "productos", $productos);
		}
	}