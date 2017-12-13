<?php

class ManipuladorDeImagenes {

    public function guardar($file) {

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (!isset($file['error']) || is_array($file['error'])) {
                throw new ExceptionImagenNoReparable("Error en los parametros.");
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($file['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new ExceptionImagenReparable("No hay archivo.");
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new ExceptionImagenNoReparable("Archivo muy grande.");
                default:
                    throw new ExceptionImagenNoReparable("Error no esperado.");
            }

            // You should also check filesize here. 
            if ($file['size'] > 20971520) {
                throw new ExceptionImagenNoReparable("Archivo muy grande.");
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $tipos = array('jpg' => 'image/jpeg', 'png' => 'image/png');
            $ext = array_search( $finfo->file($file['tmp_name']), $tipos, true);
            if (false === $ext) {
                throw new ExceptionImagenNoReparable("Formato de archivo no admitido.");
            }

            $ruta = "imagenes/productos/" . $file['name'];
            if(file_exists($ruta)){
                return $ruta;
            }
            if (!move_uploaded_file($file['tmp_name'], ASSETS_RUTA . $ruta)) {
                throw new ExceptionImagenNoReparable("No se pudo mover el archivo.");
            }
            
            return $ruta;

        } catch (RuntimeException $e) {
            echo $e->getMessage();
            return "imagenes/productos/no-disponible.png";
        }
    }

}
