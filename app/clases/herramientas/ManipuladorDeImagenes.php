<?php

class ManipuladorDeImagenes {

    public function guardar($file) {

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (!isset($file['error']) || is_array($file['error'])) {
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($file['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

            // You should also check filesize here. 
            if ($file['size'] > 20971520) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $tipos = array('jpg' => 'image/jpeg', 'png' => 'image/png');
            $ext = array_search( $finfo->file($file['tmp_name']), $tipos, true);
            if (false === $ext) {
                throw new RuntimeException('Invalid file format.');
            }

            $ruta = ASSETS_RUTA . "imagenes/productos/" . $file['name'];
            if (!move_uploaded_file($file['tmp_name'], $ruta)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            
            return $ruta;

        } catch (RuntimeException $e) {
            echo $e->getMessage();
            return APP_RUTA . "imagenes/productos/no-disponible.png";
        }
    }

}
