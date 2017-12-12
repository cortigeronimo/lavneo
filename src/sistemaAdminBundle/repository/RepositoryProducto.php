<?php

class RepositoryProducto extends Repository{

        function __construct(){
            $this->tabla = "productos";
        }
        
        protected function convertDataToObject($informacion) {
            $producto = new Producto();
            $producto->setId($informacion['id']);
            $producto->setNombre($informacion['nombre']);
            $producto->setDescripcion($informacion['descripcion']);
            $producto->setPrecioUnitario($informacion['precio_unitario']);
            $producto->setImagen($informacion['imagen']);
            $repositorioCategorias = new RepositoryCategoria();
            $categoria = $repositorioCategorias->findOneByColumn("id", $informacion['id']);
            $producto->setCategoria($categoria);
            //faltaria el de productoImpuesto
            return $producto;
        }

}
