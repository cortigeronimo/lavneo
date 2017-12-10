<?php

class Repository {

    protected $tabla;

    public function getTabla() {
        return $this->tabla;
    }

    public function setTabla($nombre) {
        $this->tabla = $nombre;
    }

    public function findAllOrderely($columnaDeOrden) {
        $cn = conexion::conectar();
        $query = "SELECT * FROM " . $this->tabla . " ORDER BY " . $columnaDeOrden . " ASC";
        $resultado = $cn->query($query);
        $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
        conexion::cerrar($cn);
        return $rows;
    }

    public function findAll() {
        $cn = conexion::conectar();
        $query = "SELECT * FROM " . $this->tabla;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionBuscarElementos();
        } finally {
            conexion::cerrar($cn);
        }
        $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
        conexion::cerrar($cn);
        return $rows;
    }

    public function findOneByColumn($columna, $valor) {
        $cn = conexion::conectar();
        $query = "SELECT * FROM " . $this->tabla . " WHERE " . $columna . " = " . $valor;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionBuscarElemento();
        } finally {
            conexion::cerrar($cn);
        }
        $rows = HerramientasParaMysql::deObjetoSqlAVector($resultado);
        conexion::cerrar($cn);
        return $rows;
    }

    public function insert($array) {
        $cn = conexion::conectar();
        $keys = array_keys($array);
        $query = "INSERT INTO " . self::TABLA . " " . $this->generarColumnas($keys) . " VALUES " . $this->generarValores($keys, $array);
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionInsertarElemento();
        } finally {
            conexion::cerrar($cn);
        }
        return $resultado;
    }
    
    private function generarColumnas($keys){
        $i = 0;
        $longitud = count($keys);
        $string = "(";
        while($i < $longitud){
            $string = $string . $keys[$i] . ",";
            $i++;
        }
        $longitudString = strlen($string);
        $string[$longitudString - 1] = ')';
        return $string;
    }
    
    private function update($arrayConValores, $campoDeBusqueda, $valor){
        $cn = conexion::conectar();
        $query = "UPDATE " . $this->tabla . " SET " . $this->generarValoresUpdate($arrayConValores) . " WHERE " . $campoDeBusqueda . " = " . $valor;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionModificarElemento();
        } finally {
            conexion::cerrar($cn);
        }
        return $resultado;
    }
    
    private function generarValoresUpdate($array){
        foreach ($array as $key => $value) {
            $string = $string . $key . " = " . $value . ",";
        }
        $longitud = strlen($string);
        $string[$longitud - 1] = '\0';
        
        return $string;
    }
    
    private function generarValores($keys, $array){
        $i = 0;
        $longitud = count($keys);
        $string = "(";
        while($i < $longitud){
            $string = $string . $array[$keys[$i]] . ",";
            $i++;
        }
        $longitudString = strlen($string);
        $string[$longitudString - 1] = ')';
        return $string;
    }
    
    private function deleteOneByColumn($column, $value){
        $cn = conexion::conectar();
        $query = "DELETE FROM " . $this->tabla . " WHERE " . $column . " = " . $value;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionEliminarElemento();
        } finally {
            conexion::cerrar($cn);
        }
        conexion::cerrar($cn);
        return $resultado;
    }
    
    private function deleteTable(){
        $cn = conexion::conectar();
        $query = "DELETE FROM " . $this->tabla;
        try {
            $resultado = $cn->query($query);
        } catch (Exception $e) {
            throw new ExceptionEliminarTabla();
        } finally {
            conexion::cerrar($cn);
        }
        return $resultado;
    }

}
