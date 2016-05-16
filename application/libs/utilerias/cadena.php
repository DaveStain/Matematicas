<?php
class libs_utilerias_cadena{
	
	public static function quitarAcentosUrl2($text)
	{	
		$text = str_replace(":","",$text);
		//echo $text;
		$text = htmlentities($text, ENT_QUOTES);
		//echo $text;
		$text = strtolower($text); 
		$patron = array (
			// Espacios, puntos y comas por guion
			'/[\., ]+/' => '-',
 
			// Vocales
			'/&agrave;/' => 'a',
			'/&egrave;/' => 'e',
			'/&igrave;/' => 'i',
			'/&ograve;/' => 'o',
			'/&ugrave;/' => 'u',
 
			'/&aacute;/' => 'a',
			'/&eacute;/' => 'e',
			'/&iacute;/' => 'i',
			'/&oacute;/' => 'o',
			'/&uacute;/' => 'u',
 
			'/&acirc;/' => 'a',
			'/&ecirc;/' => 'e',
			'/&icirc;/' => 'i',
			'/&ocirc;/' => 'o',
			'/&ucirc;/' => 'u',
 
			'/&atilde;/' => 'a',
			'/&etilde;/' => 'e',
			'/&itilde;/' => 'i',
			'/&otilde;/' => 'o',
			'/&utilde;/' => 'u',
 
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 
			// Otras letras y caracteres especiales
			'/&aring;/' => 'a',
			'/&ntilde;/' => 'n',
			'/&amp;/' => '',
			'/[;]+/' => '_',
 
			// Agregar aqui mas caracteres si es necesario
 
		);
 
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
		return $text;
	}

	public static function quitarAcentosArchivos($text)
	{	
		$text = str_replace(" ", "-", $text);
		$text = preg_replace('/[^a-zA-Z0-9-.]/s', '', $text);
		$text = preg_replace('/[^(\x20-\x7f)]*/s','',$text);
		$text = strtolower($text);
		return $text;
	}
}
?>