<?php 

	require_once ADMIN_BUNDLE."model/producto.php";

	class ManejoDeProductosController{
		public function subirProductos(){
			include_once ADMIN_BUNDLE."model/categoria.php";

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$nombre = $_POST["nombre"];
				$descripcion = $_POST["descripcion"];
				$precio = $_POST["precio"];
				$ruta = "";
				//luego hacer una funcion que pregunte si ya existe ese numero
				if((isset($_FILES['archivo'])) && ($_FILES['archivo'] !='')){
			        $temName = $_FILES['archivo']['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
			        $ruta = ASSETS_RUTA . "imagenes/productos/" . $_FILES['archivo']['name']; //donde guardo el archivo
			        $resultado = @move_uploaded_file($temName, $ruta);
			    	$ruta = $_FILES['archivo']['name'];
	            }
	            $categoria = new Categoria();
	            $producto = new Producto();
	            $categoria->setProducto($producto);
	            $producto->setCategoria($categoria);
                
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setImagen($ruta);
                $producto->setCategoria($categoria);

				return Vista::crear(MENSAJES."exito/procesadoConExito.php");

			}

			else{
				$categorias = new Categoria();
				$categorias->obtenerTodos();
				return Vista::crear(ADMIN_BUNDLE."views/manejoDeProductos/subirProductos.php", "categorias", $categorias);
			}

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