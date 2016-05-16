<?php
class libs_exception_log{

	public static function crearLog($pdo, $ex, $file, $codes, $salt, $dev){
		$codes = unserialize($codes);
		$codigo = $ex->getCode();
		$archivo = $ex->getFile();
		$linea = $ex->getLine();
		$idusuario  = (isset($_SESSION["_u"])) ? libs_hash_security::decodifica($_SESSION["_u"],SALT) : 0;

		$contenido = $ex->getTrace();
		//echo "<pre>"; print_r($contenido); echo "</pre>";

		$content = "";
		$mensaje = "";
		if(isset($contenido[0]["args"])){
			$content = (array)$contenido[0]["args"];
			$content = (string) json_encode($content);
		}
		if(isset($contenido[1])){
			$mensaje = (array)$contenido[1];
			$mensaje = (string) json_encode($mensaje);
		}

		if(in_array($codigo,$codes)){
			file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
		}else{
			try {
				/* Instanciamos el objeto */
				
    			$pdo = new PDO(DNS);
    			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			/* Ejecuta una sentencia preparada pasando un array de valores */
    			
    			$query = "INSERT INTO errorlog(Numero, Cadena, Archivo, Linea, Contexto, IDUsuario) 
    			          VALUES(?, ?, ?, ?, ?, ?)";
				$stm = $pdo->prepare($query);
				$stm->execute(array($codigo,$mensaje,$archivo,$linea,$content,$idusuario));
				$result = $stm->fetchAll();
				$pdo = null;
				
			} catch (Exception $exx) {
				file_put_contents($file, date("Y-m-d h:i:s")." \n".$content." \n", FILE_APPEND | LOCK_EX);
			}
		}
		
		/*
		if($dev == true){
			echo "<pre>Mensaje "; print_r($content); echo "</pre>"; 
			echo "<pre>Mensaje "; print_r($mensaje); echo "</pre>"; 
			echo "<pre>Código "; print_r($codigo); echo "</pre>"; 
			echo "<pre>Archivo "; print_r($archivo); echo "</pre>";
			echo "<pre>Línea "; print_r($linea); echo "</pre>";
			echo "<pre>idusuario "; print_r($idusuario); echo "</pre>";
			echo "<pre>Ex "; print_r($ex); echo "</pre>";
			echo "<pre>PDO "; print_r($pdo); echo "</pre>";
			echo "<pre>Dump "; print_r(json_encode(debug_backtrace())); echo "</pre>";
		}
		*/
		if($dev == true){
			echo "<table border='1' width='90%'>
					<tr>
						<td width='100'><strong>Código</strong></td><td>$codigo</td>
					</tr>
					<tr>
						<td><strong>Archivo</strong></td><td>$archivo</td>
					</tr>
					<tr>
						<td><strong>Línea</strong></td><td>$linea</td>
					</tr>
					<tr>
						<td><strong>Usuario</strong></td><td>$idusuario</td>
					</tr>
					<tr>
						<td><strong>Error</strong></td><td>$mensaje</td>
					</tr>
					<tr>
						<td><strong>Mensaje</strong></td><td>".$ex->getMessage()."</td>
					</tr>
				 </table>";
		}
	}
}
?>