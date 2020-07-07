<?php 

class encriptarContraseña
{
	static public function encriptar($pass){
		$salt = substr($pass,0,4)."";
		echo "<script>console.log('La sal es : ".$salt." ');";
		$ePass = crypt($pass,$salt);
		return $ePass;
	}
}

?>