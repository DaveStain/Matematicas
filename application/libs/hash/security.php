<?php
class libs_hash_security{

	public static function codifica($data,$salt){
		if($data!=""){
			$code = (string) serialize($data);
			$code = base64_encode($code."{{$salt}}");
			return $code;
		}else{
			return '';
		}
	}

	public static function decodifica($data,$salt){
		if($data!=""){
			$code = base64_decode($data);
			$code = str_replace("{{$salt}}", '', $code);
			//echo "<pre>"; print_r(__LINE__); echo "</pre>";
			//echo "<pre>"; print_r(__FILE__); echo "</pre>";
			//echo $data."<br>";
			$code = unserialize($code);
			return $code;
		}else{
			return '';
		}
	}
}
?>