<?php

	class Vista {

	//ruta, apodo y valor
    public static function crear($path,$key=null,$value=null){     
                ${$key} = $value;
                include $path;
    }

}
