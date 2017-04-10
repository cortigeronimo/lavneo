<?php 

	class HerramientasParaMysql{

		public static function deObjetoSqlAVector($resultado){
			$rows = [];
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			return $rows;
		}

		public static function deObjetoSqlAObjeto($resultado){
			$rows = [];
			while($row = $resultado->fetch_object()){
				$rows[] = $row;
			}
			return $rows;
		}

	}