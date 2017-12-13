<?php

require_once APP_RUTA . "clases/herramientas/conexion.php";

abstract class Repository {

    protected $tabla;

    protected function getTabla() {
        return $this->tabla;
    }

    protected function setTabla($nombre) {
        $this->tabla = $nombre;
    }

    public function findAllOrderely($columnaDeOrden) {
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "SELECT * FROM " . $this->tabla . " ORDER BY " . $columnaDeOrden . " ASC";
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionBuscarElementos();
        } finally {
            $conexion->cerrar($cn);
        }
        return $this->convertAllToObject($resultado);
    }

    public function findAll() {
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "SELECT * FROM " . $this->tabla;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionBuscarElementos();
        } finally {
            $conexion->cerrar($cn);
        }
        return $this->convertAllToObject($resultado);
    }

    public function findOneByColumn($columna, $valor) {
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "SELECT * FROM " . $this->tabla . " WHERE " . $columna . " = " . $valor . " LIMIT 1";
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionBuscarElemento();
        } finally {
            $conexion->cerrar($cn);
        }
        $fila = $resultado->fetch_array(MYSQLI_ASSOC);
        return $this->convertDataToObject($fila);
    }

    public function insert($objeto) {
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "INSERT INTO " . $this->tabla . " " . $this->generarColumnas() . " VALUES " . $this->generarValores($objeto);
        echo $query;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionInsertarElemento();
        } finally {
            echo $cn->error;
            $conexion->cerrar($cn);
        }
        return $resultado;
    }
    
    public function update($objeto){
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "UPDATE " . $this->tabla . " SET " . $this->generarValoresUpdate($objeto) . " WHERE id " . " = " . $objeto->getId();
        echo $query;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionModificarElemento();
        } finally {
            echo $cn->error;
            $conexion->cerrar($cn);
        }
        return $resultado;
    }

    public function deleteOneByColumn($column, $value){
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "DELETE FROM " . $this->tabla . " WHERE " . $column . " = " . $value;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionEliminarElemento();
        } finally {
            $conexion->cerrar($cn);
        }
        return $resultado;
    }
    
    public function deleteTable(){
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "DELETE FROM " . $this->tabla;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionEliminarTabla();
        } finally {
            $conexion->cerrar($cn);
        }
        return $resultado;
    }
    
    protected function convertAllToObject($filas){
        $elementos = array();
        while($fila = $filas->fetch_array(MYSQLI_ASSOC)) {
            $elementos[] = $this->convertDataToObject($fila);
        }
        return $elementos;
    }
    
    abstract protected function generarValores($objeto);
    
    abstract protected function generarValoresUpdate($objeto);

    abstract protected function generarColumnas();
    
    abstract protected function convertDataToObject($informacion);
    
}
