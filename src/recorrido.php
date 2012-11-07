<?php
	
	class Recorrido {
		private $zona;
		private $longitud;
		public $desnivel;
		
			
		function __construct($zona, $longitud, $desnivel) {
			$this->longitud = $longitud;
			$this->zona = $zona;
			$this->desnivel = $desnivel;
		}
		
		function GetZona() {
			return this->zona;
		}
		
		function GetLongitud() {
			return this->longitud;
		}
		
		function GetDesnivel() {
			return this->desnivel;
		}
		
		
	}
?>