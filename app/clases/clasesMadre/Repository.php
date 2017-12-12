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
        $resultado = $cn->query($query);
        $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
        $conexion->cerrar($cn);
        return $rows;
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
        $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
        return $this->convertAllToObject($rows);
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
        $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
        return $this->convertDataToObject($rows);
    }

    public function insert($objeto) {
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "INSERT INTO " . $this->tabla . " " . $this->generarColumnas() . " VALUES " . $this->generarValores($objeto);
        echo "query: " . $query;
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
    
    public function update($arrayConValores, $campoDeBusqueda, $valor){
        $conexion = new conexion();
        $cn = $conexion->conectar();
        $query = "UPDATE " . $this->tabla . " SET " . $this->generarValoresUpdate($arrayConValores) . " WHERE " . $campoDeBusqueda . " = " . $valor;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionModificarElemento();
        } finally {
            $conexion->cerrar($cn);
        }
        return $resultado;
    }
    
    protected function generarValoresUpdate($array){
        foreach ($array as $key => $value) {
            $string = $string . $key . " = " . $value . ",";
        }
        $longitud = strlen($string);
        $string[$longitud - 1] = '\0';
        
        return $string;
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
    
    protected function convertAllToObject($informacion){
        $elementos = array();
        foreach ($informacion as $value) {
            $elementos[] = $this->convertDataToObject($value);
        }
        return $elementos;
    }
    
    abstract protected function generarValores($valores);

    abstract protected function generarColumnas();
    
    abstract protected function convertDataToObject($informacion);
    
}
