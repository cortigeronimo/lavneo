<?php

class assets {

    public static function asset($ruta) {
        $urlprin = trim(str_replace("index.php", "", $_SERVER["PHP_SELF"]), "/");
        echo $urlprin . "/assets/" . $ruta;
    }

    public static function ruta($ruta) {
        $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);
        echo trim($urlprin, "/") . $ruta;
    }

    public static function form($ruta) {
        echo "http://" . $_SERVER["SERVER_NAME"] . "/" . $ruta;
    }

}
