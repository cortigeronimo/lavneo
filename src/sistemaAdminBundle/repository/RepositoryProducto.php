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
        
        protected function generarValores($producto) {
        $string = "(";
        $string = $string . "'" . $producto->getNombre() . "'" . ", ";
        $string = $string . "'" . $producto->getDescripcion() . "'" . ", ";
        $string = $string . "'" . $producto->getImagen() . "'" . ", ";
        $string = $string . $producto->getPrecioUnitario() . ", ";
        $string = $string . $producto->getCategoria()->getId() . ", ";
        $string = $string . ")";
        return $string;
    }

    protected function generarColumnas() {
        $string = "(";
        $string = $string . "nombre" . ", ";
        $string = $string . "descripcion" . ", ";
        $string = $string . "imagen" . ", ";
        $string = $string . "precio_unitario" . ", ";
        $string = $string . "id_categoria" . ", ";
        $string = $string . ")";
        return $string;
    }

}
