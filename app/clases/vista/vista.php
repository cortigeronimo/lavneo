<?php

	class Vista {

        public static function crear($path,$key=null,$value=null){     
                    ${$key} = $value;
                    include $path;
        }

}
