<?php

require_once ADMIN_BUNDLE . "model/Producto.php";
require_once ADMIN_BUNDLE . "model/categoria.php";

require_once ADMIN_BUNDLE . "repository/RepositoryCategoria.php";
require_once ADMIN_BUNDLE . "repository/RepositoryProducto.php";

class ManejoDeProductosController {

    public function altaProducto() {
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //luego hacer una funcion que pregunte si ya existe ese numero
            if ((isset($_FILES['file'])) && ($_FILES['file'] != '')) {
                require_once APP_RUTA . "/clases/herramientas/ManipuladorDeImagenes.php";
                $manipulador = new ManipuladorDeImagenes();
                $ruta = $manipulador->guardar($_FILES['file']);
            }
            $producto = new Producto();
            $producto->setNombre($_POST["nombre"]);
            $producto->setDescripcion($_POST["descripcion"]);
            $producto->setPrecioUnitario($_POST["precio"]);
            $producto->setImagen($ruta);
            
            $repositorioCategorias = new RepositoryCategoria();
            $categoria = $repositorioCategorias->findOneByColumn("id", $_POST["categoria"]);
            $producto->setCategoria($categoria);
            
            $repositorioProducto = new RepositoryProducto();
            $repositorioProducto->insert($producto);

            Redireccionar::redireccionarARuta("administracion");
        } else {
            $repositorioCategorias = new RepositoryCategoria();
            $categorias = $repositorioCategorias->findAllOrderely("nombre");
            return Vista::crear(ADMIN_BUNDLE . "views/manejoDeProductos/altaProducto.php", "categorias", $categorias);
        }
    }
    
    public function altaCategoria() {
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nombre = $_POST["nombre"];
            $padre = $_POST["padre"];
            
            $repositorioCategorias = new RepositoryCategoria();
            $categoriaPadre = NULL;
            
            if(strcmp($padre, "NULL") != 0){
                $categoriaPadre = $repositorioCategorias->findOneByColumn("id", $padre);
            }            
            
            $categoria = new Categoria();
            $categoria->setNombre($nombre);
            $categoria->setPadre($categoriaPadre);
            
            $repositorioCategorias->insert($categoria);
            
            Redireccionar::redireccionarARuta("administracion");
        } else {
            $repositorioCategorias = new RepositoryCategoria();
            $categorias = $repositorioCategorias->findAllOrderely("nombre");
            return Vista::crear(ADMIN_BUNDLE . "views/manejoDeProductos/altaCategoria.php", "categorias", $categorias);
        }
    }

    public function accionSobreProductos() {
        $repositorioProductos = new RepositoryProducto();
        $productos = $repositorioProductos->findAllOrderely("nombre");
        return Vista::crear(ADMIN_BUNDLE . "views/manejoDeProductos/verProductosParaModificarlosOEliminarlos.php", "productos", $productos);
    }
    
    public function bajaProducto($parametros){
        $repositorioProductos = new RepositoryProducto();
        $repositorioProductos->deleteOneByColumn("id", $parametros['id']);
        
        Redireccionar::redireccionarARuta("administracion");
    }

    public function modificarProducto($parametros) {
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            require_once APP_RUTA . "clases/herramientas/ManipuladorDeImagenes.php";
            $repositorioProducto = new RepositoryProducto();
            $producto = $repositorioProducto->findOneByColumn("id", $parametros['id']);
            $producto->setNombre($_POST["nombre"]);
            $producto->setDescripcion($_POST["descripcion"]);
            $manipulador = new ManipuladorDeImagenes();
            if($_FILES["file"]["size"] > 0) {
                $ruta = $manipulador->guardar($_FILES['file']);
                $producto->setImagen($ruta);
            }
            $producto->setPrecioUnitario($_POST["precioUnitario"]);
            $categoria = new Categoria();
            $categoria->setId($_POST["categoria"]);
            $producto->setCategoria($categoria);
            $repositorioProducto->update($producto);
            Redireccionar::redireccionarARuta("administracion");
        }
        else{
            $repositorioProductos = new RepositoryProducto();
            $repositorioCategorias = new RepositoryCategoria();
            $categorias = $repositorioCategorias->findAllOrderely("nombre");
            $producto = $repositorioProductos->findOneByColumn("id", $parametros["id"]);
            $array = array("categorias" => $categorias, "producto" => $producto);
            return Vista::crear(ADMIN_BUNDLE . "views/manejoDeProductos/modificarProductos.php", "array", $array);
        }
    }

}
