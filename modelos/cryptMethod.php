<?php 

class encriptarContraseña
{
	static public function encriptar($pass){
		$salt = substr($pass,0,4)."";
		echo "<script>console.log('La sal es : ".$salt." ');";
		$ePass = crypt($pass,$salt);
		return $ePass;
	}
	static public function generarNumero(){
		$numeroConfirmacion = "".rand(11111,99999)."";
		$_SESSION['verificacion'] = $numeroConfirmacion;
		return $numeroConfirmacion;
	}

	static public function generarLink(){
	//link contraseña

	}
}

?>